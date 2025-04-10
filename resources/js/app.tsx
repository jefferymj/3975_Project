import React from 'react';
import ReactDOM from 'react-dom/client';
import MainScreen from './components/MainScreen';
import '../css/app.css';


ReactDOM.createRoot(document.getElementById('root')!).render(
  <React.StrictMode>
    <MainScreen />
  </React.StrictMode>
);
