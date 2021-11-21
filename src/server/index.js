import axios from 'axios';

// Connect
const apiKey = 'a4999a28333d1147dbac0d104526337a';
const url = 'https://api.themoviedb.org/3';

// Play movie
const nowPlayingUrl = `${url}/movie/now_playing`;
// Top rate moving
const topratedUrl = `${url}/movie/top_rated`;
// Categories movie
const genreUrl = `${url}/genre/movie/list`;
// List movie
const moviesUrl = `${url}/discover/movie`;
// Person week
const personUrl = `${url}/trending/person/week`;
const peopleUrl = `${url}/person/popular`;
const personsUrl = `${url}/person`;
// Detail movie
const movieUrl = `${url}/movie`;
// Genders movie 
const keyUrl = `${url}/keyword`;
// TV
const tvsUrl = `${url}/discover/tv`;
const tvUrl = `${url}/tv`;
const onTvUrl = `${url}/tv/on_the_air`;
const tvPopular = `${url}/tv/popular`;
const tvTopRate = `${url}/tv/top_rated`;
const genereTVUrl = `${url}/genre/tv/list`;
const discoverUrl = `${url}/tv/airing_today`;

// Treding movie day
const treddingUrl = `${url}/trending/all/day`;

//DB 
const db = 'http://localhost/Passport/Passport/public/api/auth/getUsers';


// //DB 
// const db = 'http://localhost/Api_react_movie/public/api/list-user';

// //DB 
// const db = 'http://react-movie-api.rf.gd/api/list-user';
//check login 
export const checkLogin = async() =>{
    return localStorage.getItem('myData');
}


export const addUser = async (fromData) => {

    const repo  = await axios.post(db,fromData)
    return repo.data;
}


// Page home : 
export const fetchMovies = async () => {
    try {
        const { data } = await axios.get(nowPlayingUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })

        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) { }
}
export const fetchGenre = async () => {
    try {
        const { data } = await axios.get(genreUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const modifiedData = data['genres'].map((g) => ({
            id: g['id'],
            name: g['name']
        }))
        return modifiedData;
    } catch (error) { }
}
export const fetchMovieByGenre = async (genre_ids) => {
    try {
        const { data } = await axios.get(moviesUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1,
                with_genres: genre_ids
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) { }
}

// Profile detail preson : 

export const fetchPersons = async () => {
    try {
        const { data } = await axios.get(personUrl, {
            params: {
                api_key: apiKey
            }
        })
        const modifiedData = data['results'].map((p) => ({
            id: p['id'],
            popularity: p['popularity'],
            name: p['name'],
            profileImg: 'https://image.tmdb.org/t/p/w200' + p['profile_path'],
            known: p['known_for_department']
        }))
        return modifiedData;
    } catch (error) { }
}
// Profile detail preson : 
export const fetchProfile = async (id) => {
    try {
        const { data } = await axios.get(`${personsUrl}/${id}/images`, {
            params: {
                api_key: apiKey
            }
        })
        const modifiedData = data['profiles'].map((p) => ({
            aspect_ratio: p['aspect_ratio'],
            file_path: p['file_path'],
            height: p['height'],
            vote_average: p['vote_average'],
            vote_count: p['vote_count'],
            width: p['width'],
        }))
        return modifiedData;
    } catch (error) { }
}
export const fetchTopratedMovie = async () => {
    try {
        const { data } = await axios.get(topratedUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) {

    }
}

// Chi tiet phim
export const fetchMovieDetail = async (id) => {
    try {
        const { data } = await axios.get(`${movieUrl}/${id}`, {
            params: {
                api_key: apiKey,
                language: 'vi-VN'
            }
        });
        return data;
    } catch (error) { }
}
export const fetchMovieVideos = async (id) => {
    try {
        const { data } = await axios.get(`${movieUrl}/${id}/videos`, {
            params: {
                api_key: apiKey,
            }
        });
        return data['results'][0];
    } catch (error) { }
}
export const fetchMovieCredits = async (id) => {
    try {
        const { data } = await axios.get(`${movieUrl}/${id}/credits`, {
            params: {
                api_key: apiKey,
            }
        });
        const modifiedData = data['cast'].map((c) => ({
            id: c['id'],
            character: c['character'],
            name: c['name'],
            img: 'https://image.tmdb.org/t/p/w200' + c['profile_path'],
        }))

        return modifiedData;
    } catch (error) { }
}
export const fetchSimilarMovie = async (id) => {
    try {
        const { data } = await axios.get(`${movieUrl}/${id}/similar`, {
            params: {
                api_key: apiKey,
                language: 'vi-VN'
            }
        });
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) { }
}
//Danh sách theo danh mục 
export const fetchGendersMovie = async () => {
    try {
        const { data } = await axios.get(nowPlayingUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) { }
}
// Keyword :
export const fetchMovieKeyword = async (keyword_id) => {
    try {
        const { data } = await axios.get(`${movieUrl}/${keyword_id}/keywords`, {
            params: {
                api_key: apiKey,
            }
        });
        const modifiedData = data['keywords'].map((m) => ({
            id: m['id'],
            name: m['name'],
        }))
        return modifiedData;
    } catch (error) { }
}
export const fetchKeyDetail = async (keyword_id) => {
    try {
        const { data } = await axios.get(`${keyUrl}/${keyword_id}`, {
            params: {
                api_key: apiKey,
            }
        });
        return data;
    } catch (error) {

    }
}

export const fetchMovieByKeyword = async (keyword_id) => {
    try {
        const { data } = await axios.get(`${keyUrl}/${keyword_id}/movies`, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
            }
        });
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            title: m['title'],
            poster_path: m['poster_path'],
            overview: m['overview'],
            release_date: m['release_date'],
            original_title: m['original_title'],
            backdrop_path: m['backdrop_path'],
            popularity: m['popularity'],
        }))
        return modifiedData;
    } catch (error) { }
}
// Chi tiet truyen hinh
export const fetchTVDetail = async (id) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}`, {
            params: {
                api_key: apiKey,
                language: 'vi-VN'
            }
        });
        return data;
    } catch (error) { }
}

// Danh sách phim đã đóng có mặt diễn viên trong đó (phim):

export const fetchTVVideos = async (id) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/videos`, {
            params: {
                api_key: apiKey,
                language: 'en_US',
            }
        });
        return data['results'][0];
    } catch (error) { }
}

// Danh sách phim đã đóng có mặt diễn viên trong đó (phim):
export const fetchCreditsTV = async (id) => {
    try {
        const { data } = await axios.get(`${personsUrl}/${id}/tv_credits`, {
            params: {
                api_key: apiKey,
                language: 'vi-VN'
            }
        });
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['cast'].map((c) => ({
            id: c['id'],
            backPoster: posterUrl + c['backdrop_path'],
            popularity: c['popularith'],
            name: c['name'],
            date: c['first_air_date'],
            poster: posterUrl + c['poster_path'],
            charater: c['character'],
            nameOther: c['popularity'],
        }))

        return modifiedData;
    } catch (error) { }
}
// Diễn viên chi tiết
export const fetchPersonDetail = async (id) => {
    try {
        const { data } = await axios.get(`${personsUrl}/${id}`, {
            params: {
                api_key: apiKey,
                language: 'en_US'
            }
        });
        return data;
    } catch (error) { }
}
export const fetchPeople = async () => {
    try {
        const { data } = await axios.get(peopleUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            img: posterUrl + m['profile_path'],
            title: m['name'],
            name: m['title'],
            popularity: m['popularity'],
        }))
        return modifiedData;
    } catch (error) {

    }
}
export const fetchTVCredits = async (id) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/credits`, {
            params: {
                api_key: apiKey,
            }
        });
        const modifiedData = data['cast'].map((c) => ({
            id: c['id'],
            character: c['character'],
            name: c['name'],
            img: 'https://image.tmdb.org/t/p/w200' + c['profile_path'],
        }))
        return modifiedData;
    } catch (error) { }
}
// Danh sách khuyến nghị:
export const fetchTVRecommendations = async (id) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/recommendations`, {
            params: {
                api_key: apiKey,
            }
        });
        const modifiedData = data['results'].map((c) => ({
            id: c['id'],
            name: c['name'],
            img: 'https://image.tmdb.org/t/p/w200' + c['profile_path'],
            backdrop: 'https://image.tmdb.org/t/p/w200' + c['backdrop_path'],
            overview: c['overview'],
            first_air_date: c['first_air_date'],
            original_name: c['original_name'],
            vote_average: c['vote_average'],
            popularity: c['popularity'],
        }))
        return modifiedData;
    } catch (error) { }
}
export const fetchSimilarTV = async (id) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/similar`, {
            params: {
                api_key: apiKey,
                language: 'en_US'
            }
        });
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularity'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))

        return modifiedData;
    } catch (error) { }
}

// Session
export const fetchSessionTV = async (number_count) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${number_count}`, {
            params: {
                api_key: apiKey,
                language: 'en_US'
            }
        });
        const modifiedData = data['seasons'].map((c) => ({
            id: c['id'],
            name: c['name'],
            img: 'https://image.tmdb.org/t/p/w200' + c['poster_path'],
            img2: 'https://image.tmdb.org/t/p/w200' + c['poster_path'],
            overview: c['overview'],
            episode_count: c['episode_count'],
            date: c['air_date'],
            number_count: c['season_number'],
        }))

        return modifiedData;
    } catch (error) { }
}
// Session_episode
export const fetchSession_episode = async (id, season_number) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/season/${season_number}`, {
            params: {
                api_key: apiKey,
                language: 'en_US',

            }
        });
        const image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/No_image_available_400_x_600.svg/682px-No_image_available_400_x_600.svg.png';
        const modifiedData = data['episodes'].map((c) => ({
            id: c['id'],
            name: c['name'],
            overview: c['overview'],
            null: image,
            poster_path: c['still_path'],
            air_date: c['air_date'],
            season_number: c['season_number'],
            episode_number: c['episode_number'],
        }))

        return modifiedData;
    } catch (error) {
        console.log('ds')
     }
}
// episode
export const fetchepisode = async (id, season_number, episode_number) => {
    try {
        const { data } = await axios.get(`${tvUrl}/${id}/season/${season_number}/episode/${episode_number}`, {
            params: {
                api_key: apiKey,
                language: 'en_US'
            }
        });
        const modifiedData = data['guest_stars'].map((c) => ({
            id: c['id'],
            name: c['name'],
            character: c['character'],
            poster_path: c['profile_path'],
            season_number: c['season_number'],
            credit_id: c['credit_id'],
        }))

        return modifiedData;
    } catch (error) { }
}

export const fetchTVAriting = async () => {
    try {
        const { data } = await axios.get(discoverUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1,
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}

// TV
export const fetchDiscover = async (genre_ids) => {
    try {
        const { data } = await axios.get(tvsUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1,
                with_genres: genre_ids
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}
export const fetchOnTV = async () => {
    try {
        const { data } = await axios.get(onTvUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}

export const fetchTVGenre = async () => {
    try {
        const { data } = await axios.get(genereTVUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1
            }
        })
        const modifiedData = data['genres'].map((g) => ({
            id: g['id'],
            name: g['name']
        }))
        return modifiedData;
    } catch (error) { }
}
export const fetchTVPopular = async () => {
    try {
        const { data } = await axios.get(tvPopular, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1,
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularity'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}

// Phim đóng góp:

export const fetchTVTopRate = async () => {
    try {
        const { data } = await axios.get(tvTopRate, {
            params: {
                api_key: apiKey,
                language: 'en_US',
                page: 1
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularity'],
            title: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}
// Phim đóng góp:
export const fetchTV = async (id) => {
    try {
        const { data } = await axios.get(`${personsUrl}/${id}/movie_credits`, {
            params: {
                api_key: apiKey,
            }
        });
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['cast'].map((c) => ({
            id: c['id'],
            backPoster: posterUrl + c['backdrop_path'],
            popularity: c['popularith'],
            title: c['title'],
            date: c['release_date'],
            poster: posterUrl + c['poster_path'],
            overview: c['overview'],
            rating: c['vote_average'],
            character: c['character'],
            nameOther: c['popularity'],
        }))

        return modifiedData;
    } catch (error) { }
}
// TV

// Các xu hướng phim : 
export const fetchTredding = async () => {
    try {
        const { data } = await axios.get(treddingUrl, {
            params: {
                api_key: apiKey,
                language: 'vi-VN',
                page: 1,
              
            }
        })
        const posterUrl = 'https://image.tmdb.org/t/p/original/';
        const modifiedData = data['results'].map((m) => ({
            id: m['id'],
            tv_id: m['tv_id'],
            backPoster: posterUrl + m['backdrop_path'],
            popularity: m['popularith'],
            title: m['title'],
            name: m['name'],
            poster: posterUrl + m['poster_path'],
            overview: m['overview'],
            rating: m['vote_average'],
        }))
        return modifiedData;
    } catch (error) {

    }
}

// Lay ra danh sach users
export const listUser = async () => {
    const repo  = await axios.get('http://localhost/Passport/Passport/public/api/auth/getUsers', {
            headers: {
                'Content-Type': 'application/json',
                "X-Requested-With" : "XMLHttpRequest",
                "Authorization": "Bearer " + sessionStorage.getItem("myData")
            }
        })
    return repo.data;
}
//Lay danh sach user theo id

export const userById = async (id) => {
    const repo = await axios.get(`http://localhost/Passport/Passport/public/api/auth/getUserById/${id}`, {
        headers: {
            'Content-Type': 'application/json',
            "X-Requested-With": "XMLHttpRequest",
            "Authorization": "Bearer " + sessionStorage.getItem("myData")
        }
    })
    return repo.data;
}
