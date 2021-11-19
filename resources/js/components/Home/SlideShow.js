import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import {
  Carousel,
  CarouselItem,
  CarouselControl,
  CarouselIndicators,
  Row,
  Col,
  Button,
} from "reactstrap";
import "../../../css/SlideShow.css";

export default function SlideShow({ categoriesList }) {
  const [activeIndex, setActiveIndex] = useState(0);
  const [animating, setAnimating] = useState(false);

  useEffect(() => {
    let changeSlide_Show = setInterval(() => {
      next();
    }, 5000);
    return () => {
      clearInterval(changeSlide_Show);
    };
  }, [activeIndex]);

  const next = () => {
    if (animating) return;
    const nextIndex =
      activeIndex === categoriesList.length - 1 ? 0 : activeIndex + 1;
    setActiveIndex(nextIndex);
  };

  const previous = () => {
    if (animating) return;
    const nextIndex =
      activeIndex === 0 ? categoriesList.length - 1 : activeIndex - 1;
    setActiveIndex(nextIndex);
  };

  const goToIndex = (newIndex) => {
    if (animating) return;
    setActiveIndex(newIndex);
  };

  const slides = categoriesList.map((item) => {
    return (
      <CarouselItem
        className="slide-show-custom-tag"
        tag="div"
        key={item.id}
        onExiting={() => setAnimating(true)}
        onExited={() => setAnimating(false)}
      >
        <div className="slide-show-carouse-info">
          <p className="slide-show-category-title mb-5">{item.caption}</p>
          <Link className="slide-show-category-link">
            Shop Collections
          </Link>
        </div>
        <img
          src={item.img}
          alt={item.caption}
          className="img-fluid slide-show--custom-img"
        />
      </CarouselItem>
    );
  });

  return (
    <div className="slide-show">
      <div className="slide-show-slide">
        <Carousel activeIndex={activeIndex} next={next} previous={previous}>
          <CarouselIndicators
            items={categoriesList}
            activeIndex={activeIndex}
            onClickHandler={goToIndex}
          />
          {slides}
          <CarouselControl
            direction="prev"
            directionText="Previous"
            onClickHandler={previous}
          />
          <CarouselControl
            direction="next"
            directionText="Next"
            onClickHandler={next}
          />
        </Carousel>
      </div>
    </div>
  );
}