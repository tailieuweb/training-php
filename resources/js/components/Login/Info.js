import React, { useState } from "react";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Button } from "reactstrap";
import { Link, useHistory } from "react-router-dom";
import Swal from "sweetalert2";
import "../../../css/Info.css";
export default function Info({ isLogin }) {
    const history = useHistory();
    const [infoLogin, setInfoLogin] = useState({ ...isLogin });
    const doUpdateInfo = (event, values) => {
        console.log(`Successfully`);
        history.push('/');
    }
    const handleInvalidSubmit = (event, errors, values) => {
        Swal.fire({
            title: "Error!",
            text: "Do you want to continue ?",
            icon: "error",
            confirmButtonText: "Cool",
        });
    };
    return (
        <div className="info container mt-5 mb-5">
            <h1 className="info-title text-center">WELCOME BACK</h1>
            <AvForm
                onValidSubmit={doUpdateInfo}
                onInvalidSubmit={handleInvalidSubmit}
            >
                <AvField
                    name="email"
                    label="Email"
                    type="text"
                    placeholder="Email here..."
                    value={infoLogin.username}
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
                    name="fullname"
                    label="Fullname"
                    placeholder="Fullname here..."
                    type="text"
                    value={infoLogin.fullname}
                    validate={{
                        required: {
                            value: true,
                            errorMessage: "Please enter your fullname",
                        },
                        pattern: {
                            value: "^[A-Za-z]+$",
                            errorMessage:
                                "Your password must be composed only with letter",
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
                <AvField
                    name="birthday"
                    label="Birthday"
                    type="date"
                    value={infoLogin.birthday}
                    validate={{
                        required: {
                            value: true,
                            errorMessage: "Please enter your birthday",
                        },
                    }}
                />
                <AvField
                    name="phone"
                    label="Phone"
                    placeholder="Phone here..."
                    type="tel"
                    value={infoLogin.phone}
                    validate={{
                        required: {
                            value: true,
                            errorMessage: "Please enter your phone",
                        },
                    }}
                />
                <Button
                    type="submit"
                    color="secondary"
                    className="btn-md btn-block"
                >
                    Update
                </Button>
                <Link to="/">
                    <Button
                        color="outline-secondary"
                        className="btn-md btn-block mt-2"
                        id="btnBack"
                    >
                        Back to Home
                    </Button>
                </Link>
            </AvForm>
        </div>
    );
}
