import React, { useState, useEffect } from "react";
import {
    fetchTVDetail,
    fetchSession_episode,
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Link } from "react-router-dom";
import dateFormat from 'dateformat';
import "./sesions-episode.css";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";
export function Sessions_Episode({ match }) {

    let params = match.params;
    const [detail, setDetail] = useState([]);
    const [Session_episode, setSession_episode] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchTVDetail(params.id));
            setSession_episode(await fetchSession_episode(params.id, params.season_number));
        };
        fetchAPI();
    }, []);


    // Danh sách phát sóng mới nhất
    const listSession = Session_episode.slice(0, 10).map((c, i) => {
        return (
            <div className="Session" key={i}>
                <div className="row">
                    <div className="col-md-3">
                        <div className="filter" >
                            <Link to={`/tv/${detail.id}/season/${c.season_number}/episode/${c.episode_number}`}>
                                <img
                                    className="img-session"
                                    src={`https://image.tmdb.org/t/p/w227_and_h127_bestv2/${c.poster_path}`}
                                    alt={c.name}
                                />
                                
                            </Link>
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="wapper">
                            <span>{c.episode_number}</span>
                            <h4>{c.name} </h4>
                        </div>
                        <div className="overview">
                            {c.overview}
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="date">
                            {(dateFormat(c.air_date, "dddd mmmm d yyyy"))}
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
                        <div className="title-episode">
                            <h3 >Seasons {detail.number_of_seasons}</h3>
                        </div>
                        <div className="back-icon">
                            <a href={`/tv/${detail.id}/`} style={{ color: "white", fontSize: 15 }}>
                                <i className="fa fa-backward" aria-hidden="true" style={{ fontSize: 10 }}></i>
                                <span style={{ margin: 10 }}>Quay lại</span>
                            </a>
                        </div>
                    </div>
                    <div className="col-md-4">
                    </div>
                </div>
            </div>
            <div className="seasons-list">
                <div className="container">
                    <div className="filter">
                        <h3>Episode {detail.number_of_episodes}</h3>
                    </div>
                    <div className="episode_list">
                        {listSession}
                    </div>

                </div>
            </div>
            <Footer/>
        </div>
    );
}
