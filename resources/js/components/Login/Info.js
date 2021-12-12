import React, { useState, useEffect } from "react";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Button, Row, Col } from "reactstrap";
import Swal from "sweetalert2";
import axios from "axios";
import "../../../css/Info.css";
export default function Info({ setInfoUser, setIsLogin, role, setRoleChange }) {
    const [oldInfoData, setOldInfoData] = useState({});
    const [infoData, setInfoData] = useState({
        email: "",
        phone: "",
        address: "",
    });
    
    //Call API logout
    const doLogout = () => {
        Swal.fire({
            showCancelButton: true,
            confirmButtonText: "Yes",
            title: "Do you want logout ?",
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                setIsLogin({ isLoginStatus: false });
                setInfoUser({
                    email: "",
                    phone: "",
                    address: "",
                });
                if (localStorage.getItem("loginToken")) {
                    let tokenStr = localStorage.getItem("loginToken");
                    axios.get("http://localhost:8000/api/logout/", {
                        headers: { Authorization: `Bearer ${tokenStr}` },
                    });
                    localStorage.removeItem("loginToken");
                }
            }
        });
    };

    //Save data when input change
    const handleChange = (e) => {
        const { name, value } = e.target;
        setInfoData((infoData) => ({
            ...infoData,
            [name]: value,
        }));
    };

    //Display Admin btn change
    const displayAdminRole = () => {
        if (role.roleUser === "admin")
            return (
                <Button
                    color="outline-primary"
                    className="btn-md btn-block mt-2"
                    onClick={handleAdminChange}
                >
                    Go Admin
                </Button>
            );  
    };

    //Handle change state to go Admin page
    const handleAdminChange = (e) => {  
        setRoleChange({ role: "admin" });
    };

    useEffect(() => {
        if (localStorage.getItem("loginToken")) {
            let tokenStr = localStorage.getItem("loginToken");
            //Pass tokenLogin at Authorization of headers
            const fetchData = async () => {
                const result = await axios("http://localhost:8000/api/info/", {
                    headers: { Authorization: `Bearer ${tokenStr}` },
                });
                setInfoData({
                    ...result.data,
                });
                setInfoUser({
                    ...result.data,
                });
                setOldInfoData({
                    ...result.data,
                });
            };
            fetchData();
        }
    }, []);

    const doUpdateInfo = (event, values) => {
        Swal.fire({
            showCancelButton: true,
            confirmButtonText: "Save",
            title: "Do you want updated ?",
            icon: "question",
        }).then((result) => {
            if (result.isConfirmed) {
                if (checkOldInfoData(infoData, oldInfoData)) {
                    let infoUpdate = {
                        old_email: values.old_email,
                        old_phone: values.old_phone,
                        old_address: values.old_address,
                        ...infoData,
                    };

                    let tokenStr = localStorage.getItem("loginToken");
                    axios
                        .post("http://localhost:8000/api/info/", infoUpdate, {
                            headers: { Authorization: `Bearer ${tokenStr}` },
                        })
                        .then((res) => {
                            Swal.fire(
                                "Good job!",
                                "Updated Successfully",
                                "success"
                            );
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
                } else {
                    Swal.fire({
                        title: "Pls type anything you want to update!",
                        text: "Do you want to continue ?",
                        icon: "error",
                        confirmButtonText: "Cool",
                    });
                }
            }
        });
    };

    const checkOldInfoData = (infoData, oldInfoData) => {
        let flag = true;
        infoData.email === oldInfoData.email ? (flag = false) : (flag = true);
        infoData.phone === oldInfoData.phone ? (flag = false) : (flag = true);
        infoData.address === oldInfoData.address
            ? (flag = false)
            : (flag = true);
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
    return (
        <div className="info container mt-5 mb-5">
            <h1 className="info-title text-center">Welcome Back</h1>
            <AvForm
                onValidSubmit={doUpdateInfo}
                onInvalidSubmit={handleInvalidSubmit}
            >
                <AvField
                    hidden
                    name="old_email"
                    type="text"
                    value={infoData.email}
                />
                <AvField
                    name="email"
                    label="Email"
                    type="text"
                    placeholder="Email here..."
                    value={infoData.email}
                    onChange={handleChange}
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
                    hidden
                    name="old_phone"
                    type="text"
                    value={infoData.phone}
                />
                <AvField
                    name="phone"
                    label="Phone"
                    placeholder="Phone here..."
                    type="text"
                    value={infoData.phone}
                    onChange={handleChange}
                    validate={{
                        required: {
                            value: true,
                            errorMessage: "Please enter your phone",
                        },
                        minLength: {
                            value: 10,
                            errorMessage: "Your phone must be 10 number",
                        },
                        maxLength: {
                            value: 10,
                            errorMessage: "Your phone must be 10 number",
                        },
                        pattern: {
                            value: "^0",
                            errorMessage: "Your phone must be start with 0",
                        },
                    }}
                />
                <AvField
                    hidden
                    name="old_address"
                    type="textarea"
                    value={infoData.address}
                />
                <AvField
                    name="address"
                    label="Address"
                    placeholder="Address here..."
                    type="textarea"
                    value={infoData.address}
                    onChange={handleChange}
                    validate={{}}
                />
                <Button
                    type="submit"
                    color="success"
                    className="btn-md btn-block"
                >
                    Update
                </Button>
                {displayAdminRole()}
                <Button
                    color="outline-danger"
                    className="btn-md btn-block mt-2"
                    id="btnBack"
                    onClick={doLogout}
                >
                    Logout
                </Button>
            </AvForm>
        </div>
    );
}
