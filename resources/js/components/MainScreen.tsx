import React, { useState } from 'react';
import './MainScreen.css'; // optional

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
                credentials: 'include',
            });

            if (!res.ok) {
                throw new Error(`API request failed with status ${res.status}`);
            }

            const data = await res.json();
            console.log('✅ Received from Laravel:', data);
            setResult(data.plantnet_data); // we only care about plantnet_data here

        } catch (err: any) {
            console.error('❌ Failed to identify plant', err);
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
                    {result.results[0].species.commonNames?.length > 0 && (
                        <h1 className="text-2xl font-bold">
                            {result.results[0].species.commonNames[0]}
                        </h1>
                    )}
                    <p><strong>Species:</strong> {result.results[0].species.scientificNameWithoutAuthor}</p>
                    <p><strong>Genus:</strong> {result.results[0].species.genus.scientificNameWithoutAuthor}</p>
                    <p><strong>Family:</strong> {result.results[0].species.family.scientificNameWithoutAuthor}</p>
                    <p><strong>Common Names:</strong> {result.results[0].species.commonNames?.join(', ') || 'N/A'}</p>
                </div>
            )}
        </div>
    );
};

export default MainScreen;
