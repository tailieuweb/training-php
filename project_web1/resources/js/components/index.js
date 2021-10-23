import React from 'react'
import ReactDOM from 'react-dom'
import App from "./App"
import AuthContextProvider from './Contexts/AuthContext'
import { BrowserRouter } from 'react-router-dom'

if (typeof (Storage) !== 'undefined') {
    ReactDOM.render(
        <AuthContextProvider>
            <BrowserRouter>
                <App />
            </BrowserRouter>
        </AuthContextProvider>
        , document.getElementById('root'))
}