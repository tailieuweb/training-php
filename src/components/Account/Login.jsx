import React, { useState } from "react";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import axios from 'axios';
import "./Login/Login.css";
import { useHistory } from "react-router-dom";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";

export function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");

    // Validatete form
    function validateForm() {
        return email.length > 0 && password.length > 0;
    }
    // Lây thuộc tính:
    function setParams(event) {
        this.setState({ [event.target.email]: event.target.value })
    }
    let history = useHistory();

    function handleSubmit(event) {
        event.preventDefault();

        const data = new FormData();

        data.append("email", email);
        data.append("password", password);

        axios.post('http://localhost/Passport/Passport/public/api/auth/login', { email, password })
            .then(res => {
                if (res.status == 200) {
                    history.push('/');
                    sessionStorage.setItem('myData', res.data.access_token);
                } else {
                    sessionStorage.setItem('myData', 400);
                }
                console.log(res);
                // var tokenAll = res.data.access_token;
                // console.log(tokenAll);
            })
            .then(result => {
                alert("Ban da login thanh cong")
            })
            .catch(error => {
                console.log(error.status);
                alert("email or password are wrong")
            });

    }
    return (

        <div className="main-container">
            <div className="header">
              <Header/>

            </div>
            <div className="Login">
                <h2 className="name-login">Movie Login</h2>
                <Form onSubmit={handleSubmit}>
                    <Form.Group size="lg" controlId="email">
                        <Form.Label >Email</Form.Label>
                        <Form.Control
                            autoFocus
                            type="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </Form.Group>
                    <Form.Group size="lg" controlId="password">
                        <Form.Label>Password</Form.Label>
                        <Form.Control
                            type="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </Form.Group>
                    <Button block size="lg" type="submit" disabled={!validateForm()}>
                        Login
                    </Button>
                </Form>
            </div>
            <Footer/>
        </div>

    );
}
