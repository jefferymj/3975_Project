import React from 'react';
import ReactDOM from 'react-dom/client';
import MainScreen from './components/MainScreen';
import '../css/app.css';

const root = ReactDOM.createRoot(document.getElementById('root')!);

root.render(
    <React.StrictMode>
        <MainScreen />
    </React.StrictMode>
);
