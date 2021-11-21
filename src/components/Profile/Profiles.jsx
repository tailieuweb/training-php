import React, { useState } from "react";
import axios from 'axios';
import "./Profile.css";
import { Footer } from "../Footer/Footer";
import { Header } from "../Header/Header";

export function Profile() {
    const logo = require('./img/caheo.png');
    const [profile, setProfile] = useState([]);
  
    function handleSubmit(event) {
        event.preventDefault();
        axios.get('http://localhost/Passport/Passport/public/api/auth/user', {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + sessionStorage.getItem('myData')
            }
        })
            .then(res => {
                if (res.status == 200) {
                    console.log(res.data);
                    setProfile(res.data);
                }
            })
            .catch(error => {
                console.log(error.status);
            });

    }
    return (

        <div className="container">
            <div className="header">
              
             <Header/>

            </div>
            <div className="profile">
                <div className="row">
                    <div className="col-md-4">
                        <div className="img-title">
                            <img src={logo} alt="" />
                        </div>
                        <div className="img-name">{profile.name}</div>
                    </div>
                    <div className="col-md-8 col-content">
                        <div className="content">
                            <div className="title">
                                <span>Thông tin tài khoản</span>
                            </div>
                            <ul className="change-title">
                                <form id="frmProfile">
                                    <li>
                                        <span className="Profile-name">Name</span>
                                        <div className="profile-title">{profile.name}</div>
                                    </li>
                                    <li>
                                        <span className="Profile-name">Email</span>
                                        <span className="profile-title">{profile.email}</span>
                                    </li>
                                </form>
                            </ul>
                            <button className="profile-button" onClick={handleSubmit}>Thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
            <Footer/>
        </div>
    );
}
