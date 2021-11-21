import React, { useState, useEffect } from "react";
import {
    fetchSession_episode,
    fetchepisode,
    fetchTVDetail,
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Link } from "react-router-dom";
import "./Episode.css";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";
export function Episode({ match }) {

    let params = match.params;
    const [seasions, setSession_episode] = useState([]);
    const [Episodes, setEpisode] = useState([]);
    const [detail, setDetail] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchTVDetail(params.id));
            setSession_episode(await fetchSession_episode(params.id, params.season_number));
            setEpisode(await fetchepisode(params.id, params.season_number, params.episode_number));
        };
        fetchAPI();
    }, []);
    //  Danh sách các diễn viên của tập phim
    const listEpisode = Episodes.slice(0, 50).map((c, i) => {
        return (
            <div className="col-md-4 start-profile" key={i}>
                <div className="row">
                    <div className="col-md-4 list-start">
                        <div className="img">
                            <Link to={`/tv/${detail.id}/season/${c.number_count}`}>
                                <img className="img-fluids"
                                    src={`https://image.tmdb.org/t/p/w132_and_h132_face/${c.poster_path}`}
                                    alt={c.name}></img>
                            </Link>
                        </div>
                    </div>
                    <div className="col-md-8">
                        <div className="infor">
                            <h4>{c.name}</h4>
                            <p></p>
                            <span>{c.character}</span>
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
                            <img src={`https://image.tmdb.org/t/p/w58_and_h87_face/${detail.poster_path}`} className="img-seasons" />
                        </div>
                    </div>
                    <div className="col-md-6">
                        <div className="title-episode-numbers">
                            <h3 >Seasons {detail.number_of_seasons}</h3>
                        </div>
                        <div className="back-icon">
                            <a href={`/tv/${detail.id}/season/${detail.season_number}`} style={{ color: "white ", fontSize: 15 }}>
                                <i className="fa fa-backward" aria-hidden="true" style={{ fontSize: 10 }}></i>
                                <span style={{ margin: 10 }}>Quay lại</span>
                            </a>
                        </div>
                    </div>
                    <div className="col-md-4">
                    </div>
                </div>
            </div>
            <div className="list-movie">
                <div className="container">
                    <div className="filter">
                        <h3>Guest Stars {seasions.episode_number}</h3>
                    </div>
                    <div className="row">
                        {listEpisode}
                    </div>
                </div>
            </div>
            <Footer/>
        </div>
    );
}