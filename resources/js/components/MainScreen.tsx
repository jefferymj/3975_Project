import React, { useState } from 'react';
import './MainScreen.css';  // temp css

const MainScreen: React.FC = () => {
    const [image, setImage] = useState<File | null>(null);
    const [preview, setPreview] = useState<string | null>(null);
    const [result, setResult] = useState<any>(null);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState<string | null>(null);


    const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0];
        if (file) {
            setImage(file);
            setPreview(URL.createObjectURL(file));
        }
    };

    const handleIdentify = async () => {
        if (!image) return;
        setLoading(true);
        const formData = new FormData();
        formData.append('image', image);

        try {
            setError(null);
            const res = await fetch('http://localhost:8000/api/identify-plant', { //route aint working so cant test
                method: 'POST',
                body: formData,
            });
            if (!res.ok) {
                throw new Error('API request failed');
            }
            const data = await res.json();
            setResult(data);
        } catch (err) {
            console.error('Failed to identify plant', err);
            setResult(null);
            setError('Could not identify this plant. Please try another image.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="container">
            <h1 className="title">🌿 Plant Identifier</h1>

            <label htmlFor="image-upload" className="choose-button">
                {image ? 'Change Image' : 'Choose Image'}
            </label>
            <input
                id="image-upload"
                type="file"
                accept="image/*"
                onChange={handleFileChange}
                style={{ display: 'none' }}
            />

            {preview && (
                <img src={preview} alt="Preview" className="preview" />
            )}

            <button onClick={handleIdentify} disabled={loading} className="identify-button">
                {loading ? 'Identifying...' : 'Identify Plant'}
            </button>

            {error && (
                <div className="error-message" style={{ textAlign: 'center' }}>
                    {error}
                </div>
            )}

            {result && (
                <div className="result-card">
                    <h2>Result:</h2>
                    <p><strong>Species:</strong> {result.species || 'N/A'}</p>
                    <p><strong>Genus:</strong> {result.genus || 'N/A'}</p>
                    <p><strong>Family:</strong> {result.family || 'N/A'}</p>
                    {result.common_names?.length > 0 && (
                        <p><strong>Common Names:</strong> {result.common_names.join(', ')}</p>
                    )}
                </div>
            )}
        </div>
    );
};

export default MainScreen;
