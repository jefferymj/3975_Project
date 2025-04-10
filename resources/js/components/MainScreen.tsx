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
            setResult(null);
            setError(null);
        }
    };

    const handleIdentify = async () => {
        if (!image) return;
        setLoading(true);
        setError(null);

        const formData = new FormData();
        formData.append('image', image);

        try {
            const res = await fetch('http://localhost:8000/api/identify-plant', {
                method: 'POST',
                body: formData,
            });

            if (!res.ok) {
                throw new Error(`API request failed with status ${res.status}`);
            }

            const data = await res.json();
            setResult(data);
        } catch (err: any) {
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
                <div className="error-message">
                    {error}
                </div>
            )}

            {result && result.results && result.results.length > 0 && (
                <div className="result-card">
                    {result.results[0].species.commonNames && result.results[0].species.commonNames.length > 0 && (
                        <h1><strong>{result.results[0].species.commonNames[0]}</strong></h1>
                    )}
                    <p><strong>Species:</strong> {result.results[0].species.scientificNameWithoutAuthor}</p>
                    <p><strong>Genus:</strong> {result.results[0].species.genus.scientificNameWithoutAuthor}</p>
                    <p><strong>Family:</strong> {result.results[0].species.family.scientificNameWithoutAuthor}</p>
                    {result.results[0].species.commonNames && result.results[0].species.commonNames.length > 0 && (
                        <p><strong>Common Names:</strong> {result.results[0].species.commonNames.join(', ')}</p>
                    )}
                </div>
            )}
        </div>
    );
};
export default MainScreen;
