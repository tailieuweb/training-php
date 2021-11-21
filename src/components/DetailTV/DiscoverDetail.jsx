import React, { useState, useEffect } from "react";
import {
    fetchTVDetail,
    fetchTVVideos,
    fetchTVCredits,
    fetchSessionTV,
    fetchTVRecommendations,
    fetchSimilarTV,
    fetchMovieByGenre
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Modal } from "react-bootstrap";
import ReactPlayer from "react-player";
import ReactStars from "react-rating-stars-component";
import { Link } from "react-router-dom";
import "../Home/Aminition/Home.css";
import "../Style/MovieDetail.css";
import dateFormat from 'dateformat';
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";

export function DiscoverDetail({ match }) {
    let params = match.params;
    let genres = [];
    const [isOpen, setIsOpen] = useState(false);
    const [detail, setDetail] = useState([]);
    const [video, setVideo] = useState([]);
    const [credits, setCredits] = useState([]);
    const [sessionTV, setSession] = useState([]);
    const [Recommendations, setRecommendations] = useState([]);
    const [SimilarTV, setSimilar] = useState([]);
    const [movieByGenre, setMovieByGenre] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchTVDetail(params.id));
            setVideo(await fetchTVVideos(params.id));
            setCredits(await fetchTVCredits(params.id));
            setSession(await fetchSessionTV(params.id));
            setRecommendations(await fetchTVRecommendations(params.id));
            setSimilar(await fetchSimilarTV(params.id));
            setMovieByGenre(await fetchMovieByGenre(28));
        };
        fetchAPI();
    }, [params.id]);


    genres = detail.genres;
    const MoviePalyerModal = (props) => {
        const youtubeUrl = "https://www.youtube.com/watch?v=";

        return (
            <Modal
                {...props}
                size="lg"
                aria-labelledby="contained-modal-title-vcenter"
                centered
            >
                <Modal.Header closeButton>
                    <Modal.Title
                        id="contained-modal-title-vcenter"
                        style={{ color: "#000000", fontWeight: "bolder" }}
                    >
                        {detail.name} Trailer
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body style={{ backgroundColor: "#000000" }}>
                    <ReactPlayer
                        className="container-fluid"
                        url={youtubeUrl + video.key}
                        playing
                        width="100%"
                    ></ReactPlayer>
                </Modal.Body>
            </Modal>
        );


    };

    let genresList;
    if (genres) {
        genresList = genres.map((g, i) => {
            return (
                <li className="list-inline-item" key={i}>
                    <button type="button" className="btn btn-outline-info">
                        {g.name}
                    </button>
                </li>
            );
        });
    }

    const listCredits = credits.slice(0, 20).map((c, i) => {
        return (
            <div className="col-md-2 text-center" key={i}>
                <Link to={`/person/${c.id}`}>
                    <img
                        className="img-person"
                        src={c.img}
                        alt={c.name}
                    />
                </Link>
                <p className="font-weight-bold text-center">{c.name}</p>
                <p
                    className="font-weight-light text-center"
                    style={{ color: "#5a606b" }}
                >
                    {c.character}
                </p>
            </div>
        );
    });

    // Phan hien tai
    const listSession = sessionTV.slice(0, 1).map((c, i) => {
        return (
            <div className="row">
                <div className="col-md-3">
                    <div className="text" key={i}>
                        <Link to={`/tv/${c.id}`}>
                            <img
                                className="img-session"
                                src={c.img}
                                alt={c.name}
                            />
                        </Link>

                    </div>
                </div>
                <div className="col-md-6">

                    <div className="title-session">
                        <h5>{c.name}</h5>
                        Năm {c.date} | Tập {c.episode_count}
                        <p>
                            {c.name} của {detail.name} được công chiếu ngày {dateFormat(c.date)}
                        </p>
                        <a href={`/tv/${detail.id}/sesson`} className="animated-button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            SHOW ALL
                        </a>
                    </div>

                </div>
                <div className="col-md-3">


                </div>
            </div>
        );
    });
    // Danh sách khuyến nghị
    const listRecommendations = Recommendations.slice(0, 24).map((c, index) => {
        return (
            <div className="col-md-2 pogss" key={index}>

                <Link to={`/tv/${c.id}`} style={{ display: "block"}}>
                    <img
                        className="img-Recommendations"  style={{width: "100%", height: "165px", borderRadius: "18px"}}
                        src={c.backdrop}
                        alt={c.name}
                    />
                </Link>
                <div className="name">
                    <p style={{ fontWeight: "600", textAlign: "center", fontSize: "14px"}}>{c.name}</p>
                    {/* <p>
                        {c.vote_average} %
                    </p> */}
                </div>
            </div>
        );
    });

    const listSimilar = SimilarTV.slice(0, 40).map((value, i) => {
        return (
            <div className="col-md-2 text-center" key={i}>
                <Link to={`/tv/${value.id}`}>
                    <img
                        className="img-person"
                        src={value.poster}
                        alt={value.name}
                    />
                </Link>
                <p className="font-weight-bold text-center">{value.title}</p>
                <p
                    className="font-weight-light text-center"
                    style={{ color: "#5a606b" }}
                >

                </p>
            </div>
        );
    });
    // Lấy các tấm hình:
    const images = movieByGenre.slice(0, 12).map((i) => {
        return (
            <img src={i.poster} alt={i.title} className="pic" />
        );
    });
    let myInlineStyle = {
        backgroundImage: `url(http://image.tmdb.org/t/p/original/${detail.backdrop_path})`,
        backgroundPosition: "right 2px top",
        backgroundSize: "cover",
        backgroundRepeat: "no-repeat",
    }
    console.log(detail);
    return (
        <div className="main-container">

            <div className="hearder">
               <Header/>
            </div>

            {/* Chi tiết phim */}
            <div className="movie-trailer" style={myInlineStyle}>
                <div className="container">
                    <div className="transformers-box">
                        <div className="row desc-film">
                            <div className="col-lg-6">
                                <div className="transformers-content">
                                    <MoviePalyerModal
                                        show={isOpen}
                                        onHide={() => {
                                            setIsOpen(false);
                                        }}
                                    ></MoviePalyerModal>

                                    <div className="text-center" style={{ width: "100%" }}>
                                        <img
                                            className="img-fluid"
                                            src={`http://image.tmdb.org/t/p/original/${detail.poster_path}`}
                                            alt={detail.name}
                                        ></img>
                                        <div className="carousel-center">
                                            <i
                                                onClick={() => setIsOpen(true)}
                                                className="far fa-play-circle"
                                                style={{ fontSize: 95, color: "#f4c10f", cursor: "pointer" }}
                                            ></i>
                                        </div>
                                        {/* <div
                      className="carousel-caption"
                      style={{ textAlign: "center", fontSize: 40 }}
                    >
                      {detail.name}
                    </div> */}
                                    </div>
                                </div>

                            </div>
                            <div className="col-lg-6">
                                <div className="transformers-content">
                                    <h2>{detail.name}</h2>
                                    <ul className="list-inline">{genresList}</ul>
                                    <ul>
                                        <li>
                                            <div className="transformers-left">
                                                Rating:
                                            </div>
                                            <div className="transformers-right">
                                                <ReactStars
                                                    count={detail.vote_average}
                                                    size={20}
                                                    color1={"#f4c10f"}
                                                ></ReactStars>
                                            </div>
                                        </li>

                                        <li>
                                            <div className="transformers-left">
                                                Thống kê đánh giá:
                                            </div>
                                            <div className="transformers-right">
                                                {detail.vote_count} đánh giá
                                            </div>
                                        </li>
                                        <li>
                                            <div className="transformers-left">
                                                Ngày phát hành:
                                            </div>
                                            <div className="transformers-right">
                                            {dateFormat(detail.release_date, "dd/mm/yyyy")}
                                            </div>
                                        </li>
                                        <li>
                                            <div className="transformers-left">
                                                Thời lượng:
                                            </div>
                                            <div className="transformers-right">
                                                {detail.episode_run_time} phút
                                            </div>
                                        </li>
                                        <li>
                                            <div className="details-content">
                                                <div className="details-overview">
                                                    <h2>Chi tiết phim</h2>
                                                    <p>{detail.overview}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* Phần hiện tại */}
            <div className="person-list">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="person">
                                {/* <p style={{ color: "white", fontWeight: "bolder", margin: "20px auto" }}>Phần hiện tại</p> */}
                                <p className="block--title">Phần hiện tại</p>
                            </div>
                            <div className="person-session">
                                {listSession}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/* Danh sách khuyến nghị */}
            <div className="recommendations-list">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="recommendations" style={{overflow: "hidden"}}>
                                <p className="block--title">Danh sách khuyến nghị</p>
                                {/* <p style={{ color: "white", fontWeight: "bolder", margin: "20px auto" }}>Danh sách khuyến nghị</p> */}
                                <div className="knowwn">
                                    <div className="row">
                                        <div className="list-recommendations list-sroll hover-recommend" style={{gap:0}}>
                                            {listRecommendations}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {/* Danh sách phim tương tự */}
            <div className="person-list">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="person">
                                <p className="block--title">Các phim liên quan</p>
                                {/* <p style={{ color: "white", fontWeight: "bolder", margin: "20px auto" }}>Các phim liên quan</p> */}
                                <div className="knowwn">
                                    <div className="row">
                                        <div className="list-similar list-sroll">
                                            {listSimilar}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {/* Footer */}
            <Footer/>
        </div>
    );
}