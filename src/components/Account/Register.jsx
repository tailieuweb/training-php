import React, { useState, useEffect } from "react";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import "./Login/Login.css";
import axios from 'axios';
import { useHistory } from "react-router-dom";
import Swal from 'sweetalert2'


import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";

export function Register() {

    const [email, setEmail] = useState("");
    const [name, setName] = useState("");
    const [password, setPassword] = useState("");
    const [password_confirmation, setConfirmPassword] = useState("");
    

    useEffect(() => {
        const fetchAPI = async () => {

        };
        fetchAPI();
    }, []);

    function validateForm() {
        return email.length > 0 && password.length > 0;
    }
    let history = useHistory();

    function handleSubmit(event) {
        event.preventDefault();
        
        const form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("password", password);
      
        if (password == password_confirmation) {
            axios.post("http://localhost/Passport/public/api/auth/signup", { name, email, password, password_confirmation })
                .then(res => {
                    history.push('login');
                })
                .catch(error => {
                    if (error.response.status == "400") {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Email already exists ',
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        })
                    }
                });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Please Password !',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }

    }

    return (

        <div className="main-container">
            <div className="header">
               <Header/>

            </div>
            <div className="Login">
                <h2 className="name-login">Movie Login</h2>
                <Form onSubmit={handleSubmit}>
                    <RegisterForm id="name" lable="Name" type="text" value={name} change={(event) => setName(event.target.value)} />
                    <RegisterForm id="email" lable="Email" type="email" value={email} change={(event) => setEmail(event.target.value)} />
                    <RegisterForm id="password" lable="Password" type="password" value={password} change={(event) => setPassword(event.target.value)} />
                    <RegisterForm id="password_confirmation" lable="Confirm Password" type="password" value={password_confirmation} change={(event) => setConfirmPassword(event.target.value)} />
                    <Button block size="lg" type="submit" disabled={!validateForm()}>
                        Register
                    </Button>
                </Form>
            </div>
            <Footer/>
        </div>

    );
}
function RegisterForm(props) {
    return (
        <Form.Group size="lg" controlId={props.id}>
            <Form.Label>{props.lable}</Form.Label>
            <Form.Control
                type={props.type}
                value={props.name}
                onChange={props.change}
            />
        </Form.Group>

    );
}