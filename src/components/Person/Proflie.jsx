import React, { useState, useEffect } from "react";
import {
    fetchPersonDetail,
    fetchProfile,
} from "../../server";

import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import "../Home/Aminition/Home.css";
import '../Person/Style.css';
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";


export function Profiles({ match }) {
    let params = match.params;
    const [detail, setDetail] = useState([]);
    const [profile, setProfile] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchPersonDetail(params.id));
            setProfile(await fetchProfile(params.id));
        };
        fetchAPI();
    }, [params.id]);

    //Nhận danh sách profile của preson
    const listProfile = profile.slice(0, 10).map((item, input) => {
        return (

            <div className="col-md-3 col-sm-6 padding-profile" key={input}>
                <div className="border-profile">
                    <div className="top-profile">
                        <img src={`https://www.themoviedb.org/t/p/w220_and_h330_face/${item.file_path}`} />
                    </div>
                    <div className="over-profile">
                        {item.vote_count}
                    </div>
                    <div className="average-profile">
                        {item.vote_average}
                    </div>
                    <label>Size</label>
                    <div className="profile-height-with">
                        {item.width} x {item.height}
                    </div>
                </div>
            </div>

        );
    });
    return (
        <div className="top-header">
            <Header/>
            <div className="main-profile">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="top-profile">
                                <div className="row">
                                    {listProfile}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <Footer/>
        </div>

    );



}
