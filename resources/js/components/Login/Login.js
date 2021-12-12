import React, { useState, useLayoutEffect } from "react";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Button } from "reactstrap";
import { Link } from "react-router-dom";
import Swal from "sweetalert2";
import axios from "axios";
import "../../../css/Login.css";
//Components
import Info from "./Info";
import Admin from "../../components/Admin/Admin";

export default function Login({
    isLogin,
    setIsLogin,
    setInfoUser,
    role,
    setRoleChange,
    setRoleOfUser
}) {
    useLayoutEffect(() => {
        if (localStorage.getItem("loginToken")) {
            setIsLogin({ isLoginStatus: true });
        }
    }, []);

    const [loginData, setLoginData] = useState({
        Username: "",
        password: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setLoginData((loginData) => ({
            ...loginData,
            [name]: value,
        }));
    };
    //Get Data at Form
    const doLogin = (event, values) => {
        let infoLogin = {
            ...loginData,
        };
        axios
            .post("http://localhost:8000/api/login/", infoLogin)
            .then((res) => {
                if (res.data.token !== undefined) {
                    localStorage.setItem("loginToken", res.data.token);
                    Swal.fire(
                        "Login Successfully !",
                        "Welcome Back To Uneo !!!",
                        "success"
                    ).then(() => {
                        setIsLogin({ isLoginStatus: true });
                    });
                } else {
                    Swal.fire({
                        title: "Your Username and Password wrong !",
                        text: "Do you want to continue ?",
                        icon: "error",
                        confirmButtonText: "Cool",
                    });
                }
            })
            .catch((err) => {
                Swal.fire({
                    title: "Error!",
                    text: "Do you want to continue ?",
                    icon: "error",
                    confirmButtonText: "Cool",
                });
                console.log(err);
            });
    };

    const handleInvalidSubmit = (event, errors, values) => {
        Swal.fire({
            title: "Error!",
            text: "Do you want to continue ?",
            icon: "error",
            confirmButtonText: "Cool",
        });
    };


    //If isLogin -> Info, !isLogin -> Login
    if (isLogin.isLoginStatus) {
        return (
            <Info
                setInfoUser={setInfoUser}
                setIsLogin={setIsLogin}
                role={role}
                setRoleChange={setRoleChange}
            />
        );
    } else {
        return (
            <div className="login container mt-5 mb-5">
                <h1 className="login-title text-center">LOGIN</h1>
                <AvForm
                    onValidSubmit={doLogin}
                    onInvalidSubmit={handleInvalidSubmit}
                >
                    <AvField
                        name="Username"
                        label="Username"
                        type="text"
                        placeholder="Your username..."
                        value={loginData.Username}
                        onChange={handleChange}
                        validate={{
                            required: {
                                value: true,
                                errorMessage: "Please enter your email",
                            },
                            minLength: {
                                value: 6,
                                errorMessage:
                                    "Your password must be between 6 and 16 characters",
                            },
                            maxLength: {
                                value: 13,
                                errorMessage:
                                    "Your password must be between 6 and 16 characters",
                            },
                        }}
                    />
                    <AvField
                        name="password"
                        label="Password"
                        type="password"
                        placeholder="Your password..."
                        value={loginData.password}
                        onChange={handleChange}
                        validate={{
                            required: {
                                value: true,
                                errorMessage: "Please enter your password",
                            },
                            pattern: {
                                value: "^[A-Za-z0-9]+$",
                                errorMessage:
                                    "Your password must be composed only with letter and numbers",
                            },
                            minLength: {
                                value: 6,
                                errorMessage:
                                    "Your password must be between 6 and 16 characters",
                            },
                            maxLength: {
                                value: 13,
                                errorMessage:
                                    "Your password must be between 6 and 16 characters",
                            },
                        }}
                    />
                    <Button
                        type="submit"
                        color="success"
                        className="btn-md btn-block"
                    >
                        Submit
                    </Button>
                    <Link to="/register">
                        <Button
                            color="outline-info"
                            className="btn-md btn-block mt-2"
                        >
                            Register
                        </Button>
                    </Link>
                </AvForm>
            </div>
        );
    }
}
