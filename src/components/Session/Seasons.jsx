import React, { useState, useEffect } from "react";
import {
    fetchTVDetail,
    fetchSessionTV,
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Link } from "react-router-dom";
import dateFormat from 'dateformat';
import "./Seasons.css";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";
// import { Session } from "inspector";
export function Seasons({ match }) {

    let params = match.params;
    const [Seasions, setSession] = useState([]);
    const [detail, setDetail] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchTVDetail(params.id));
            setSession(await fetchSessionTV(params.id));
        };
        fetchAPI();
    }, []);


    // Danh sách phát sóng mới nhất
    const listSession = Seasions.slice(0, 20).map((c, i) => {
        return (
            <div className="session" key={i}>
                <div className="row">
                    <div className="col-md-2">
                        <div className="text-season" >
                            <Link to={`/tv/${detail.id}/season/${c.number_count}`}>
                                <img
                                    className="img-session"
                                    src={c.img}
                                    alt={c.name}
                                />
                            </Link>
                        </div>
                    </div>
                    <div className="col-md-9">
                        <div className="title-session-2">
                            <h5>{c.name}</h5>
                            Năm {c.date} | Tập {c.episode_count}
                            <p>
                                {c.name} của {detail.name} được công chiếu ngày {dateFormat(c.date, "dddd mmmm d yyyy")}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        );
    });
    return (
        <div className="container">
            {/* Hearder */}
            <div className="main-container">
                <Header/>
            </div>
            <div className="baner-seasons">
                <div className="row">
                    <div className="col-md-2">
                        <div className="baner-center-images">
                            <img src={`https://image.tmdb.org/t/p/w200/${detail.poster_path}`} className="img-seasons" />
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="title-season">
                            <h3 >{detail.name}</h3>
                        </div>
                        <div className="back-icon">
                            <a href={`/tv/${detail.id}/`} style={{ color: "white", fontSize: 15 }}>
                                <i className="fa fa-backward" aria-hidden="true" style={{ fontSize: 10 }}></i>
                                <span style={{ margin: 10 }}>Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div className="seasons-version-list">
                <div className="container">
                    {listSession}
                </div>
            </div>
            <Footer/>
        </div>
    );
}
