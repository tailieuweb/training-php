import React, { useState } from 'react';

export const AuthContext = React.createContext({
    token: '',
    data: '',
    isLoggedIn: false,
    login: (token, dataUser) => { },
    logout: () => { }
});

function AuthContextProvider(props) {
    const startValue = localStorage.getItem('token')
    const jsonUserData = localStorage.getItem('data')

    const [token, setToken] = useState(startValue);
    const [data, setData] = useState(JSON.parse(jsonUserData));
    const isLoggedIn = !!token;

    const loginHandler = async (token, dataUser) => {
        setToken(token)
        let stringDataUser = dataUser;
        
        setData(JSON.parse(dataUser))
        localStorage.setItem('token', token);
        localStorage.setItem('data', stringDataUser);
    }

    const logoutHandler = () => {
        setToken(null)
        setData(null)
        localStorage.removeItem('token')
        localStorage.removeItem('data')
    }

    const ctxValue = {
        token: token,
        data: data,
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
