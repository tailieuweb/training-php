import React from 'react'
import ReactDOM from 'react-dom'
import App from "./App"
import AuthContextProvider from './Contexts/AuthContext'
import { BrowserRouter } from 'react-router-dom'
import ProductsContextProvider from './Contexts/ProductsContext'

if (typeof (Storage) !== 'undefined') {
    ReactDOM.render(
        <AuthContextProvider>
            <BrowserRouter>
                <App />
            </BrowserRouter>
        </AuthContextProvider>
        , document.getElementById('root'))
}