import React from "react";
import loading from "../assets/images/pixel-dog.gif";
//------------------------------------------
export default function ImageLoading() {
  return (
    <img
      style={{
        position: "absolute",
        top: "50%",
        left: "50%",
        transform: "translate(-50%, -50%)",
        userSelect: "none",
      }}
      src={loading}
      width="100"
    />
  );
}
