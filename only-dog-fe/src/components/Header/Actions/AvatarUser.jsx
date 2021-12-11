import React, { useState, memo, useContext } from "react";
import greyImg from "../../../assets/images/grey.jpg";
import { Link } from "react-router-dom";
import getUserIdFromAccessToken from "../../../helpers/getUserIdFromAccessToken";
import { AuthContext } from "../../../contexts/AuthProvider";
import { AppContext } from "../../../contexts/AppProvider";
//--------------------------------------------------
export default memo(function AvatarUser() {
  const [loaded, setLoaded] = useState(false);
  const { stateAccessToken } = useContext(AuthContext);
  const { stateObInfoUserCurrent } = useContext(AppContext);
  //--------------------------------------------------
  return (
    <Link to={"/profile?user_id=" + getUserIdFromAccessToken(stateAccessToken)}>
      <img
        role="button"
        width="30"
        height="30"
        src={
          import.meta.env.VITE_DOMAIN_API + stateObInfoUserCurrent?.pathAvatar
        }
        style={{ objectFit: "cover", userSelect: "none" }}
        onLoad={() => setLoaded(true)}
        className={loaded ? "rounded-circle me-3" : "d-none"}
      />
      {!loaded && (
        <img
          className="rounded-circle me-3"
          src={greyImg}
          height={30}
          width={30}
        />
      )}
    </Link>
  );
});
