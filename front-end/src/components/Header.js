import React from "react";
import PropTypes from "prop-types";
import "../css/Header.css";
import route from "../constant/routes";
import { Link } from "react-router-dom";

//* Header
Header.propTypes = {};

function Header(props) {
  //onchange get value option
  /* getPostByCategory
   * Call Call api tất cả bài viết theo category
   * Lấy tất cả bà viết
   */
  const onchange = (e) => {
    props.parenCallBack(e.target.value);
  };
  //GET  CATEGORIES
  /* GET aLL  CATEGORIES
   * Call Call api tất cả category
   */
  const { listCategories } = props;
  return (
    <nav className="navbar">
      <h1>The Homies Blog</h1>
      {listCategories ? (
        <select
          onChange={(e) => onchange(e)}
          className="px-3 ml-4 py-2 text-base font-medium text-white bg-pink-500 rounded-md appearance-none hover:bg-pink-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
        >
          <option>Categories</option>
          {listCategories.map((category) => (
            <option key={category.id} value={category.id}>
              {category.name}
            </option>
          ))}
        </select>
      ) : (
        <div></div>
      )}

      <div className="links">
        <Link to={route.homepage}> Home</Link>
        <Link to="./Posts"> Posts</Link>
        <Link to="./Register" className="sign-in">
          {" "}
          Register
        </Link>
        <Link to="./Login" className="Resgister">
          {" "}
          Login
        </Link>
      </div>
    </nav>
  );
}

export default Header;
