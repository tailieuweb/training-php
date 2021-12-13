import React, { useState } from "react";
import PropTypes from "prop-types";

function StarRating(props) {
  const [rating, setRating] = useState(0);
  const [hover, setHover] = useState(0);
  const handleStar = (e) => {
    setRating(e);
    console.log(e);
    props.parentCallback(e);
  };
  return (
    <div className="star-rating">
      {[...Array(5)].map((star, index) => {
        index += 1;
        return (
          <button
            type="button"
            key={index}
            className="bg-transparent border-none outline-none cursor-pointer"
            className={
              index <= (hover || rating)
                ? "on text-yellow-400"
                : "off text-white"
            }
            onClick={() => handleStar(index)}
            onMouseEnter={() => setHover(index)}
            onMouseLeave={() => setHover(rating)}
          >
            <span className="star">
              <svg
                className="w-8 h-8 sm:h-10 sm:w-10 lg:h-12 lg:w-12 xl:h-14 xl:w-14 "
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </span>
          </button>
        );
      })}
    </div>
  );
}

export default StarRating;
