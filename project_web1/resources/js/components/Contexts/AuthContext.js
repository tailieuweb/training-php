import React, {useState} from 'react';

export const AuthContext = React.createContext({
    token: '',
    isLoggedIn: false,
    login: (token) => { },
    logout: () => { }
});

function AuthContextProvider(props) {
    const startValue = localStorage.getItem('token')
    const [token, setToken] = useState(startValue);
    const isLoggedIn = !!token;

    const loginHandler = async (token) => {
        setToken(token)
        localStorage.setItem('token', token);
    }

    const logoutHandler = () => {
        setToken(null)
        localStorage.removeItem('token')
    }

    const ctxValue = {
        token: token,
        isLoggedIn: isLoggedIn,
        login: loginHandler,
        logout: logoutHandler
    }

    return (
        <AuthContext.Provider value={ctxValue}>
            {props.children}
        </AuthContext.Provider>
    )
}

export default AuthContextProvider

