import React, { useState, memo } from "react";
import ButtonFollow from "../../../components/ButtonFollow";
import Placeholder from "../../../components/Placeholder";
import { Link } from "react-router-dom";
//--------------------------------------------------
export default memo(function Suggestion({ userName, userId, pathAvatar }) {
  const [loaded, setLoaded] = useState(false);
  //--------------------------------------------------
  return (
    <div className="col-4 col-md-2 text-center mb-3">
      <Link to={"/profile?user_id=" + userId}>
        <img
          src={import.meta.env.VITE_DOMAIN_API + pathAvatar}
          alt=""
          width="60"
          height="60"
          role="button"
          style={{ objectFit: "cover", userSelect: "none" }}
          onLoad={() => setLoaded(true)}
          className={loaded ? "rounded-circle mb-2" : "d-none"}
        />
      </Link>
      {!loaded && <Placeholder rounded={true} width={60} height={60} />}
      <br />
      <small>
        <b>{userName}</b>
      </small>
      <br />
      <ButtonFollow userIdBeFollow={userId} />
    </div>
  );
});
