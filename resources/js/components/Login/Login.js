import React from "react";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Button } from "reactstrap";
import { Link } from "react-router-dom";
import Swal from "sweetalert2";
import "../../../css/Login.css";
//Components
import Info from "./Info";

export default function Login({ isLogin, setIsLogin, accountData }) {
    //Do Login
    const setLoginInfo = (loginCheck) => {
        if (loginCheck.length === 0) {
            Swal.fire({
                title: "Error!",
                text: "Do you want to continue ?",
                icon: "error",
                confirmButtonText: "Cool",
            }); 
        } else
            setIsLogin({
                ...loginCheck[0],
                isLoginStatus: true,
            });
    };

    //Get Data at Form
    const doLogin = (event, values) => {
        let email = values.email;
        let password = values.password;
        let infoLogin = {
            username: email,
            password: password,
        };

        let loginCheck = accountData.filter((value, index) => {
            return validateForm(infoLogin, value) === true;
        });
        setLoginInfo(loginCheck);
    };

    //Check Login Info at Form
    const validateForm = (infoLogin, accountData) => {
        let flag = true;
        infoLogin.username === accountData.username &&
        infoLogin.password === accountData.password
            ? (flag = true)
            : (flag = false);

        return flag;
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
        return <Info isLogin={isLogin} accountData={accountData} />;
    } else {
        return (
            <div className="login container mt-5 mb-5">
                <h1 className="login-title text-center">LOGIN</h1>
                <AvForm
                    onValidSubmit={doLogin}
                    onInvalidSubmit={handleInvalidSubmit}
                >
                    <AvField
                        name="email"
                        label="Email"
                        type="text"
                        placeholder="Your email..."
                        validate={{
                            required: {
                                value: true,
                                errorMessage: "Please enter your email",
                            },
                            email: {
                                value: true,
                                errorMessage: "Your email not correct",
                            },
                        }}
                    />
                    <AvField
                        name="password"
                        label="Password"
                        type="password"
                        placeholder="Your password..."
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
                                value: 16,
                                errorMessage:
                                    "Your password must be between 6 and 16 characters",
                            },
                        }}
                    />
                    <Button
                        type="submit"
                        color="secondary"
                        className="btn-md btn-block"
                    >
                        Submit
                    </Button>
                    <Link to="/register">
                        <Button
                            color="outline-secondary"
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
