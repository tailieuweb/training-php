import React, { useState, useEffect } from "react";
import {
    fetchKeyDetail,
    fetchMovieByKeyword,
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import "../Style/MovieDetail.css";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";


export function Keyword({ match }) {
    let params = match.params;
    const [detailKey, setKeyDetail] = useState([]);
    const [keyword, setByKeyword] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setKeyDetail(await fetchKeyDetail(params.keyword_id));
            setByKeyword(await fetchMovieByKeyword(params.keyword_id));
        };
        fetchAPI();
    }, [params.id]);

    // Show lisst keyword : a
    const keywrrord = keyword.slice(0, 20).map((c, i) => {
        return (
            <li className="keywword" key={i}>
                <div className="row">
                    <div className="col-md-2">
                        <a href={`/movie/${c.id}`}>
                            <div className="img-proter-key">
                                <img src={`https://www.themoviedb.org/t/p/w94_and_h141_bestv2/${c.poster_path}`} alt={c.original_title} />
                            </div>
                        </a>
                    </div>
                    <div className="col-md-10">
                        <div className="name-key">
                            <h4>{c.title}</h4>
                        </div>
                        <div className="date-key-word-movie">
                            {c.release_date}
                        </div>
                        <div className="ov-key-dom">
                            <p>
                                {c.overview}
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        );
    });



    return (
        <div className="main-container">
            <div className="hearder">
                <Header/>
            </div>
            <div className="pading-top-name-key">
                <h4>
                    {detailKey.name}
                </h4>
            </div>
            <div className="list-movie-keyword">
                <div className="container">
                    <div className="ul-keyword-com">
                        <ul>
                            {keywrrord}
                        </ul>
                    </div>
                </div>
            </div>
            <Footer/>
        </div>
    );
}
