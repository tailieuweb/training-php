import React, { useContext } from 'react'

import './assets/css/Font.css'

import { Switch, Route, Redirect } from "react-router-dom"
import LogInPage from './Page/LogInPage'
import { AuthContext } from './Contexts/AuthContext';

import LogOut from './Components/LogOut/LogOut';
import Products_Show from './Components/Products_Show/Products_Show';
import RegisterPage from './Page/RegisterPage';
import HomePage from './Page/HomePage';
import ProductDetailPage from './Page/ProductDetailPage';
import ShoppingCartPage from './Page/ShoppingCartPage';

import ProductsContextProvider from './Contexts/ProductsContext';
import ShoppingCartContextProvider from './Contexts/ShoppingCartContext'
import CategoriesContextProvider, { CategoriesContext } from './Contexts/CategoriesContext';


function Home() {
    return (
        <React.Fragment>
            <LogOut />
            <Products_Show />
        </React.Fragment>
    );
}

function App() {
    const authCtx = useContext(AuthContext);
    return (
        <React.Fragment>
            {
                !authCtx.isLoggedIn &&
                <Switch>
                    <Route exact path='/'><Redirect to="/login" /></Route>
                    <Route exact path="/home"><Redirect to="/login" /></Route>
                    <Route path="/login" component={LogInPage} />
                    <Route path="/register" component={RegisterPage} />
                </Switch>
            }
            {
                authCtx.isLoggedIn &&
                <Switch>
                    {/* <Route exact path="/" component={Home} /> */}
                    <ShoppingCartContextProvider>
                        <ProductsContextProvider>
                            <CategoriesContextProvider>
                                <Route exact path='/' component={HomePage}></Route>
                                <Route exact path="/home" component={HomePage}></Route>
                                <Route exact path="/product/:slug" component={ProductDetailPage} />
                                <Route exact path="/shopping-cart" component={ShoppingCartPage} />
                            </CategoriesContextProvider>
                        </ProductsContextProvider>
                    </ShoppingCartContextProvider>
                </Switch>
            }
        </React.Fragment>
    )
}

export default App