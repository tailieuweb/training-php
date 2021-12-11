import React, { useState, memo } from "react";
import Placeholder from "../../components/Placeholder";
import ButtonFollow from "../../components/ButtonFollow";
import { Link } from "react-router-dom";
import toTop from "../../helpers/toTop";
//--------------------------------------------------
export default memo(function User({ userId, userName, pathAvatar }) {
  const [loaded, setLoaded] = useState(false);
  //--------------------------------------------------
  return (
    <div className="col-4 col-md-2 text-center mb-3">
      <Link to={"/profile?user_id=" + userId}>
        <img
          src={import.meta.env.VITE_DOMAIN_API + pathAvatar}
          alt="Image user find"
          width="80"
          height="80"
          role="button"
          style={{ objectFit: "cover", userSelect: "none" }}
          onLoad={() => setLoaded(true)}
          className={loaded ? "rounded-circle" : "d-none"}
        />
      </Link>
      {!loaded && <Placeholder rounded={true} width={80} height={80} />}
      <br />
      <small>{userName}</small>
      <br />
      <ButtonFollow userIdBeFollow={userId} />
    </div>
  );
});
