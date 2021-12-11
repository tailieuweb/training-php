import React, { memo } from "react";
import { BsArrowUpCircle } from "react-icons/bs";
import toTop from "../helpers/toTop";
//--------------------------------------------------
export default memo(function BackToTop() {
  //--------------------------------------------------
  return (
    <BsArrowUpCircle
      onClick={() => toTop()}
      id="btn-back-to-top"
      style={{
        position: "fixed",
        bottom: 20,
        right: 20,
      }}
      size="30"
      role="button"
      className="text-muted"
    />
  );
});
