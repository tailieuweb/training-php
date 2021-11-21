import React, { useState, useEffect } from "react";
import {
    fetchTredding,
} from "../../server";
import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Link } from "react-router-dom";
import "../Home/Aminition/Home.css";
import "../Footer/Footer";
import { Footer } from "../Footer/Footer";
import "../Header/Header";
import { Header } from "../Header/Header";
export function Treding() {


    const [trending, setTrending] = useState([]);


    useEffect(() => {
        const fetchAPI = async () => {
            setTrending(await fetchTredding(28));

        };
        fetchAPI();
    }, []);


    const trendingList = trending.slice(0, 18).map((value, i) => {
        return (
            <div className="col-md-2 col-sm-6" key={i}>
                <div className="card-img">
                    <Link to={`/movie/${value.id}` || `/tv/${value.tv_id}`}>
                        <img className="img-fluids" src={value.poster} alt={value.title}></img>
                    </Link>
                    <a class="info" href={`/tv/${value.id}`}>Xem</a>
                </div>
                <div className="title-movie">
                    {value.title || value.name}

                </div>

            </div>
        );
    });





    return (
        <div className="trending-main">
         {/* header */}
            <Header/>

            <div className="trending">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <h2>XU HƯỚNG PHIM HÔM NAY</h2>
                            <div className="list-tv">
                                <div className="row">
                                    {trendingList}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            {/* Footer */}
            <Footer />

        </div>

    );
}
