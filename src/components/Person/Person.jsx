import React, { useState, useEffect } from "react";
import {
    fetchPersonDetail,
    fetchTV,
    fetchCreditsTV,
    fetchPeople,
} from "../../server";

import "react-bootstrap-carousel/dist/react-bootstrap-carousel.css";
import { Link } from "react-router-dom";
import "../Home/Aminition/Home.css";
import '../Person/Style.css';

import InfiniteCarousel from "react-leaf-carousel";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";

export function Person({ match }) {
    let params = match.params;
    const [detail, setDetail] = useState([]);
    const [KnonwnPerson, setKnonwnPerson] = useState([]);
    const [KnonwnPersonTv, setKnonwnPersonTV] = useState([]);
    const [popularPersonTMDB, setpopularPersonTMDB] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setDetail(await fetchPersonDetail(params.id));
            setKnonwnPerson(await fetchTV(params.id));
            setKnonwnPersonTV(await fetchCreditsTV(params.id));
            setpopularPersonTMDB(await fetchPeople());
        };
        fetchAPI();
    }, [params.id]);
    //Nhận tín dụng truyền hình: 
    const listhistoryTV = KnonwnPersonTv.slice(0, 8).map((item, input) => {
        return (

            <tr key={input}>
                <td>{item.date}</td>
                <td className="name-link">
                    <Link to={`/tv/${item.id}`}>
                        {item.name} as {item.charater}
                    </Link>
                </td>
                <td>{item.nameOther}</td>
            </tr>

        );
    });
    //Nhận tín dụng phim: 
    const listhistoryMovie = KnonwnPerson.slice(0, 8).map((item, input) => {
        return (

            <tr key={input}>
                <td>{item.date}</td>
                <td className="name-link">
                    <Link to={`/movie/${item.id}`}>
                        {item.title} as {item.charater}
                    </Link>
                </td>
                <td>{item.nameOther}</td>
            </tr>

        );
    });
    //Những người nỗi tiếng trong TMDB
    const popularPerson = popularPersonTMDB.slice(0, 12).map((item, index) => {
        return (

            <div key={index}>
                <div className="card">
                    <Link to={`/person/${item.id}`}>
                        <img className="img-fluid" src={item.img} alt={item.title}></img>
                    </Link>
                </div>
                <div className="mt-3">
                    <p style={{ fontWeight: "bolder" }}>{item.title}</p>
                    <p style={{ fontWeight: "bolder" }}>{item.popularity}</p>
                </div>

            </div >
        );
    });
    // Bộ xử lý
    const KwonList1 = KnonwnPerson.slice(0, 24).map((c, i) => {
        return (
            <div key={i}>
                <div className="card">
                    <Link to={`/movie/${c.id}`}>
                        <img className="img-fluid" src={c.poster} alt={c.title}></img>
                    </Link>
                </div>
                <div className="mt-3">
                    <p style={{ fontWeight: "bolder" }}>{c.title}</p>
                </div>

            </div >
        );
    });

    return (
        <div className="top-header">
            <div className="container">
                <div className="row">
                   <Header/>

                </div>
                <div className="detail-pofile">
                    <div className="row">
                        <div className="col-md-4">
                            <div className="cards">
                                <div className="images-person">
                                    <img className="face img-detail" src={`https://www.themoviedb.org/t/p/w300_and_h450_bestv2/${detail.profile_path}`} alt={detail.tit} />
                                </div>
                                <div className="face back"></div>
                            </div>
                            <div className="button-images">
                                <a href={`/persons/${detail.id}/images/profiles`} className="profile">Profile</a>
                            </div>
                        </div>
                        <div className="col-md-8">
                            <div className="profile-name">
                                <h4>
                                    {detail.name}
                                </h4>
                            </div>
                            <p className='person-text-color'>Tiểu sử : </p>
                            <div className="biography">
                                <div className="panel">
                                    {detail.biography}
                                </div>
                            </div>
                            <div className="Birthday">
                                <div className='person-text-color'>
                                    Sinh năm :
                                </div>
                                <p>{detail.birthday}</p>
                                <div className="place">
                                    <h6 className='person-text-color'>Nơi sinh : </h6>
                                    <p>{detail.place_of_birth}</p>
                                </div>
                            </div>
                            <p className='person-text-color'>
                                Được biết đến với
                            </p>
                            <RLCarousel />

                        </div>






                    </div>
                </div>
                <div className="table-tv">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12">
                                <table className="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">History TV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {listhistoryTV}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div className="table-movie">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12">
                                <table className="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">History Movie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {listhistoryMovie}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div className="title-popularPersonTMDB">
                    <h4>Người nổi tiếng trong tuần TMDB</h4>
                    <div className="container">
                        <RLCarouselPerson />
                    </div>
                </div>
            </div>
            <Footer/>
        </div>

    );

    function RLCarouselPerson() {
        return (
            <InfiniteCarousel
                breakpoints={[
                    {
                        breakpoint: 200,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                ]}
                lazyLoad={false}
                autoCycle={true}
                cycleInterval={5000}
                showSides={true}
                sidesOpacity={0.5}
                sideSize={0.1}
                slidesToScroll={1}
                slidesToShow={5}
                scrollOnDevice={true}
            >
                {popularPerson}
            </InfiniteCarousel>
        );
    }
    function RLCarousel() {
        return (
            <InfiniteCarousel
                breakpoints={[
                    {
                        breakpoint: 200,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                ]}
                lazyLoad={false}
                autoCycle={true}
                cycleInterval={3000}
                showSides={true}
                sidesOpacity={0.5}
                sideSize={0.1}
                slidesToScroll={1}
                slidesToShow={5}
                scrollOnDevice={true}
            >
                {KwonList1}
            </InfiniteCarousel>
        );
    }

}
