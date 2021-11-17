import React, { useContext, useEffect, useState } from 'react';

import 'antd/dist/antd.css';
import '../assets/css/Container.css';
import '../assets/css/LayoutWrapper.css';
import '../assets/css/HomePage.css';

import CarouselBanners from '../Components/CarouselBanners';
import ListOfProducts from '../Components/ListOfProducts';
import banners from '../Services/banners.service';
import LayoutWrapper from '../Components/LayoutWrapper';


function HomePage(props) {
    const [isChecked, setIsChecked] = useState(false);


    const mainContent = () => {
        return (
            <div className="content">
                <div className="container">
                    <div className="banners-section">
                        <div className="banner__left-section">
                            <CarouselBanners></CarouselBanners>
                        </div>
                        <img className="banner__right-section" src={banners.banner_freeshipping} alt="banner-img"></img>
                    </div>

                    <div className="products-section">
                        <ListOfProducts></ListOfProducts>
                    </div>
                </div>
            </div>
        );
    }

    return (
        <>
            <div className="home-page">
                <LayoutWrapper mainContent={mainContent}></LayoutWrapper>
            </div>
        </>
    );
}

export default HomePage;