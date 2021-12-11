import React, { memo } from "react";
import logo from "../../assets/images/logo.svg";
import { Link } from "react-router-dom";
import toTop from "../../helpers/toTop";
//--------------------------------------------------
export default memo(function Logo() {
  //--------------------------------------------------
  return (
    <Link to="/">
      <img
        role="button"
        src={logo}
        alt="Logo OnlyDog"
        width={200}
        style={{ userSelect: "none" }}
        className="my-2"
      />
    </Link>
  );
});
