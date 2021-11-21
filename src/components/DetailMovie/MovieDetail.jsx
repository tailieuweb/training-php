import React, { useState, useEffect } from "react";
import {
  fetchMovieDetail,
  fetchMovieVideos,
  fetchMovieCredits,
  fetchSimilarMovie,
  fetchMovieKeyword,
  fetchKeyDetail,
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


export function MovieDetail({ match }) {
  let params = match.params;
  let genres = [];
  const [isOpen, setIsOpen] = useState(false);
  const [detail, setDetail] = useState([]);
  const [video, setVideo] = useState([]);
  const [casts, setCasts] = useState([]);
  const [similarMovie, setSimilarMovie] = useState([]);
  const [keyword, setKeyword] = useState([]);
  const [detailKey, setKeyDetail] = useState([]);
  const [movieByGenre, setMovieByGenre] = useState([]);
  useEffect(() => {
    const fetchAPI = async () => {
      setDetail(await fetchMovieDetail(params.id));
      setVideo(await fetchMovieVideos(params.id));
      setCasts(await fetchMovieCredits(params.id));
      setSimilarMovie(await fetchSimilarMovie(params.id));
      setKeyword(await fetchMovieKeyword(params.id))
      setKeyDetail(await fetchKeyDetail(params.keyword_id));
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
            {detail.title}
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
      console.log(genresList);
      return (
        <li className="list-inline-item" key={i}>
          <button type="button" className="btn btn-outline-info">
            {g.name}
          </button>
        </li>
      );
    });
  }

  const keywrrord = keyword.slice(0, 10).map((c, i) => {
    return (
      <li className="keywword" key={i}>
        <a href={`/keyword/${c.id}/movie`}>{c.name}</a>
      </li>
    );
  });
  const listCredits = casts.slice(0, 20).map((c, i) => {
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
  const similarMovieList = similarMovie.slice(0, 30).map((item, index) => {
    return (
      <div className="col-md-2 col-sm-6" key={index}>
        <div className="card-img">
          <Link to={`/movie/${item.id}`}>
            <img className="img-fluids" src={item.poster} alt={item.title}></img>
          </Link>
        </div>
        <div className="mt-3">
          <p style={{ fontWeight: "bolder" }}>{item.title}</p>
          <p>Rated: {item.rating}</p>
          <ReactStars
            count={item.rating}
            size={20}
            color1={"#f4c10f"}
          ></ReactStars>
        </div>
      </div>
    );
  });
  let myInlineStyle = {
    backgroundImage: `url(http://image.tmdb.org/t/p/original/${detail.backdrop_path})`,
    backgroundPosition: "right 2px top",
    backgroundSize: "cover",
    backgroundRepeat: "no-repeat",
  }
  // Lấy các tấm hình:
  const images = movieByGenre.slice(0, 12).map((i) => {
    return (
      <img src={i.poster} alt={i.title} className="pic" />
    );
  });
  return (
    <div className="main-container">
      <div className="hearder">
        <Header/>
      </div>
      {/* New detail movie */}

      <div className="detail-movie" style={myInlineStyle}>
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
                    <div
                      className="carousel-caption"
                      style={{ textAlign: "center", fontSize: 40 }}
                    >
                      {detail.name}
                    </div>
                  </div>
                </div>

              </div>
              <div className="col-lg-6">
                <div className="transformers-content">
                  <h2>{detail.original_title}</h2>
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
                        {detail.runtime} phút
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
              <div className="div-keyword">
                <div className="row">
                  <div className="col-md-12 col-sm-8">
                    <div className="transformers-left-top block--title">
                      Keywords
                    </div>
                    <ul>
                      {keywrrord}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {/* Danh sách tác giả */}
      <div className="person-list">
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <div className="person">
                <p className="block--title">Diễn viên</p>
                <div className="knowwn">
                  <div className="row">
                    <div className="list-person list-sroll">
                      {listCredits}
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      {/* Danh sách phim tương tự */}
      <div className="similar-list--block">
        <div className="container">
          <div className="row">
            <div className="col-md-12">
              <div>
                <p className="similar-film--title block--title">Các phim liên quan</p>
                <div className="knowwn">
                  <div className="row">
                    <div className="list-similar list-similar--detail__film list-sroll">
                      {similarMovieList}
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
