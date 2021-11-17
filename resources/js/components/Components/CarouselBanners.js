import React, { useState } from 'react';

import '../assets/css/CarouselBanners.css';

import banners from '../Services/banners.service';

import { Carousel } from 'antd';

function CarouselBanners(props) {
    const [list_of_banners] = useState([
        banners.banner_0,
        banners.banner_1,
        banners.banner_2,
        banners.banner_3,
        banners.banner_4,
        banners.banner_5,
        banners.banner_6,
        banners.banner_7,
        banners.banner_8,
        banners.banner_9,
        banners.banner_10
    ]);

    return (
        <div className="carousel-banners">
            <Carousel autoplay arrows>
                {
                    list_of_banners.map((element, index) => {
                        return (
                            <div key={`banner-${index}`} className="banner-wrapper">
                                <img src={element} alt={`banner-${index}`}></img>
                            </div>
                        );
                    })
                }
            </Carousel>
        </div>
    );
}

export default CarouselBanners;