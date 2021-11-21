import React, { useState } from "react";
import axios from 'axios';
import "./Login/Login.css";
import { useHistory } from "react-router-dom";

export function Logout() {


    let history = useHistory();
    function handleSubmit(event) {
        event.preventDefault();

        axios.post('http://localhost/Passport/public/api/auth/logout')
            .then(res => {
                if (res.status == 200) {
                    history.push('/login');
                }
            })
            .catch(error => {
                console.log(error.status);
            });

    }
    return (

        <li className="nav-hover">
            <div className="login-templeta">
                <a href="#" onSubmit={handleSubmit}>Logout</a>
            </div>
        </li>

    );
}
