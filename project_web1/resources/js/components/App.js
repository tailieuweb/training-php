import React, { useContext } from 'react'
import { Switch, Route, Redirect } from "react-router-dom"
import LogInPage from './Page/LogInPage'
import { AuthContext } from './Contexts/AuthContext';
import LogOut from './Components/LogOut/LogOut';
import RegisterPage from './Page/RegisterPage';
import Products_Show from './Components/Products_Show/Products_Show';

function Home() {
    return (<React.Fragment>
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
                    <Route path="/login" component={LogInPage} />
                    <Route path="/register" component={RegisterPage} />
                </Switch>
            }
            {
                authCtx.isLoggedIn &&
                <Switch>
                    <Route exact path="/" component={Home} />
                </Switch>
            }
        </React.Fragment>
    )
}

export default App