import React from 'react';
import {
    Button,
    createMuiTheme,
    Tab,
    Tabs,
    TextField,
    ThemeProvider,
} from "@material-ui/core";
import "./Search.css";
import SearchIcon from "@material-ui/icons/Search";
import { useEffect, useState } from "react";
import axios from "axios";
import "../Home/Aminition/Home.css";
import { Footer } from '../Footer/Footer';
import { Header } from '../Header/Header';

const Search = () => {
    const [type, setType] = useState(0);
    const [searchText, setSearchText] = useState("");
    const [page, setPage] = useState(1);
    const [content, setContent] = useState([]);


    const darkTheme = createMuiTheme({
        palette: {
            type: "dark",
            primary: {
                main: "#fff",
            },
        },
    });
    const fetchSearch = async () => {
        try {
            const { data } = await axios.get(
                `https://api.themoviedb.org/3/search/${type ? "tv" : "movie"}?api_key=a4999a28333d1147dbac0d104526337a&language=en-US&query=${searchText}&page=1&include_adult=false`
            );
            setContent(data.results);
            console.log(data);
        } catch (error) {
            console.error(error);
        }
    };

    useEffect(() => {
        window.scroll(0, 0);
        fetchSearch();
        // eslint-disable-next-line
    }, [type, 1]);

    return (

        <div>
            <div className="hearder">
                {/* Header */}
                <Header/>
            </div>
            <ThemeProvider theme={darkTheme}>
                <div className="search">
                    <TextField
                        style={{ flex: 1 }}
                        className="searchBox"
                        label="Search"
                        variant="filled"
                        onChange={(e) => setSearchText(e.target.value)}
                    />
                    <Button
                        onClick={fetchSearch}
                        variant="contained"
                        style={{ marginLeft: 10 }}
                    >
                        <SearchIcon fontSize="large" />
                    </Button>
                </div>
                <Tabs
                    value={type}
                    indicatorColor="primary"
                    textColor="primary"
                    onChange={(event, newValue) => {
                        setType(newValue);
                        setPage(1);
                    }}
                    style={{ paddingBottom: 5 }}
                    aria-label="disabled tabs example"
                >
                    <Tab style={{ width: "50%", marginLeft: "175px" }} label="Tìm kiếm phim" />
                    <Tab style={{ width: "50%", marginLeft: "175px" }} label="Phim truyền hình" />
                </Tabs>
            </ThemeProvider>
            <div className="trending">
                <div className="container">
                    <div className="list-search">
                        <div className="row">

                            {content &&
                                content.map((c) => (
                                    <div className="col-md-2">
                                        <div className="card-img">
                                            <img src={`https://image.tmdb.org/t/p/original/${c.poster_path}`} className="img-search"></img>
                                            <a class="info" href={`/movie/${c.id}` || `/tv/${c.id}`}>Xem</a>
                                        </div>
                                        <div className="title-movie">
                                            {c.title || c.name}
                                        </div>
                                    </div>
                                ))}
                            {searchText &&
                                !content &&
                                (type ? <h2>No Series Found</h2> : <h2>No Movies Found</h2>)}
                        </div>
                    </div>
                </div>
            </div>

         {/* footer */}
         <Footer/>
        </div>
    );
};

export default Search;
