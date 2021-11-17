import React, { useState } from 'react';

import 'bootstrap/dist/css/bootstrap.min.css';
import '../assets/css/ProductIntroCarousel.css';

import Carousel from 'react-bootstrap/Carousel';

function ProductIntroCarousel(props) {
    // Variables:
    const [index, setIndex] = useState(0);
    const [owlItems] = useState([
        { src: 'https://wallpaperaccess.com/full/3949076.jpg', alt: 'First slide' },
        { src: 'https://blog.haposoft.com/content/images/2020/05/react-native.png', alt: 'Second slide' },
        { src: 'https://cutewallpaper.org/21/js-wallpaper/Is-it-okay-to-build-sites-that-rely-on-JavaScript-.jpg', alt: 'Third slide' },
        { src: 'https://i.pinimg.com/originals/49/1a/68/491a68c5cc79da11284c767d5cbd814b.jpg', alt: 'Fourth slide' },
        { src: 'https://wallpaperaccess.com/full/1947484.jpg', alt: 'Fifth slide' },
        { src: 'https://cdn.wallpapersafari.com/96/84/pdEZfz.jpg', alt: 'Sixth slide' }
    ]);
    const [owlItems_position, setOwlItems_position] = useState(0);


    // Functions:
    const handleSelect = (selectedIndex, e) => {
        setIndex(selectedIndex);
    };

    const handleOnclick_ForIndicator = (selectedIndex, e) => {
        setIndex(selectedIndex);
    };

    const handleOnclick_ForMovingOwlItems_toLeft = () => {
        if (owlItems_position !== 0) {
            setOwlItems_position((currentState) => {
                return currentState + 111;
            });
        }
    }

    const handleOnclick_ForMovingOwlItems_toRight = () => {
        // Nếu (tổng chiều dài - chiều dài bị ẩn bên trái) > (tổng chiều dài có thể hiển thị):
        if (111 * 5 < (111 * owlItems.length) + owlItems_position) {
            setOwlItems_position((currentState) => {
                return currentState - 111;
            });
        }
    }


    // Component:
    return (
        <div className="product__carousel">
            <Carousel activeIndex={index} onSelect={handleSelect} variant="dark" fade>
                {/* List of items: */}
                {
                    owlItems.map((element, i) => {
                        return (
                            <Carousel.Item key={`owlitem-${i}`} interval={5000}>
                                <img
                                    className="d-block w-100"
                                    src={element.src}
                                    alt={element.alt}
                                />
                                <Carousel.Caption>
                                </Carousel.Caption>
                            </Carousel.Item>
                        );
                    })
                }
            </Carousel>

            {/* List of thumbnails: */}
            <div className="owl-carousel list-of-thumbnails">
                <div className="owl-items" style={{ transform: `translateX(${owlItems_position}px)` }}>
                    {owlItems.map((element, i) => {
                        return (
                            <div
                                key={`owlitem-btn-${i}`}
                                onClick={() => { return handleOnclick_ForIndicator(i) }}
                                className={`owl-item${(i === index ? ' choosed' : '')}`}
                            >
                                <img
                                    className="owl-item__img"
                                    src={element.src}
                                    alt={element.alt}
                                ></img>
                            </div>
                        );
                    })}
                </div>
                <div
                    className={`btn-left${owlItems_position === 0 ? ' disabled' : ''}`}
                    onClick={handleOnclick_ForMovingOwlItems_toLeft}
                >
                    &#60;
                </div>
                <div
                    className={`btn-right${111 * 5 >= (111 * owlItems.length) + owlItems_position ? ' disabled' : ''}`}
                    onClick={handleOnclick_ForMovingOwlItems_toRight}
                >
                    &#62;
                </div>
            </div>

            {/* Thumbnail number: */}
            <div className="thumbnail-number">
                <div>{`${index + 1}/${owlItems.length}`}</div>
            </div>
        </div>
    );
}

export default ProductIntroCarousel;