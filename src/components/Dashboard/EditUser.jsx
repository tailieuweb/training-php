import React, { useState, useEffect } from "react";
import Form from "react-bootstrap/Form";
import Button from "react-bootstrap/Button";
import "../Account/Login/Login.css";
import { useHistory } from "react-router-dom";
import axios from "axios";

import {
    userById

} from "../../server";
import { Header } from "../Header/Header";

export function EditUser({ match }) {
    let params = match.params;
    const split =  (params) => {
        var test1 = params.slice(11,13);
        return test1; 
    }
    const [arrayUserByID, setUserById] = useState([]);
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    let [version, setVersion] = useState("");
    useEffect(() => {
        const fetchAPI = async () => {
            setUserById(await userById(params.id));
        };
        fetchAPI();
    }, []);

    // Validatete form
    let history = useHistory();
    function handleSubmit(event) {
        event.preventDefault();
        console.log(name, email, password);
        console.log(version);
        version = arrayUserByID.version;
        axios.post(`http://localhost/Passport/Passport/public/api/auth/updateUser/${params.id}`, { name, email, password, version },
            {
                headers: {
                    'Content-Type': 'application/json',
                    "X-Requested-With": "XMLHttpRequest",
                    "Authorization": "Bearer " + sessionStorage.getItem("myData")
                }
            })
            .then(res => {
                if (res.status == 200) {
                    history.push('/dashboard');
                }
            })
            .catch(error => {
                if (error.response.status == '422') {
                    alert("Error Update");
                    window.location.reload();

                }
                else {
                    console.log(error);
                    alert("Email Already Exist");
                }
            });

    }
    return (

        <div className="main-container">
            <div className="header">
               <Header/>

            </div>
            <div className="Login">
                <h2 className="name-login">Edit User</h2>
                <Form method="GET" onSubmit={handleSubmit}>
                    <Form.Group size="lg" controlId="email">
                        <Form.Label >Name: &nbsp;</Form.Label>
                        <Form.Label> &nbsp; {arrayUserByID.name}</Form.Label>
                        <Form.Control
                            autoFocus
                            type="text"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                        />
                    </Form.Group>
                    <Form.Group size="lg" controlId="email">
                        <Form.Label >Email: &nbsp;</Form.Label>
                        <Form.Label> &nbsp; {arrayUserByID.email}</Form.Label>
                        <Form.Control
                            autoFocus
                            type="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </Form.Group>
                    <Form.Group size="lg" controlId="password">
                        <Form.Label>Password: </Form.Label>
                        <Form.Control
                            type="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </Form.Group>
                    <Form.Group size="lg" controlId="version">
                        <Form.Control
                            type="text"
                            style={{ display: "none" }}
                            value= {version}
                            onChange={(e) => setVersion(e.target.value)}
                        />
                    </Form.Group>
                    <Button block size="lg" type="submit" >
                        Edit
                    </Button>
                </Form>
            </div>
        </div>

    );
}