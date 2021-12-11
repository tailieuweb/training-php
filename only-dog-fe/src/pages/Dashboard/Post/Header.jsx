import React, { useState, memo } from "react";
import Placeholder from "../../../components/Placeholder";
import splitDate from "../../../helpers/splitDate";
import { Link } from "react-router-dom";
import ButtonFollow from "../../../components/ButtonFollow";
//-----------------------------------------------------------
export default memo(function Header({ dataPost }) {
  const dataUser = dataPost?.user;
  const [loaded, setLoaded] = useState(false);
  //-----------------------------------------------------------
  return (
    <div className="d-flex justify-content-between">
      <div className="d-flex">
        <Link to={"/profile?user_id=" + dataUser?._id}>
          <img
            src={import.meta.env.VITE_DOMAIN_API + dataUser?.pathAvatar}
            alt="Avatar"
            width="40"
            height="40"
            role="button"
            style={{ objectFit: "cover", userSelect: "none" }}
            onLoad={() => setLoaded(true)}
            className={loaded ? "rounded-circle me-1 my-1" : "d-none"}
          />
        </Link>
        {!loaded && (
          <div className="me-1 my-1">
            <Placeholder rounded={true} width={40} height={40} />
          </div>
        )}
        <div>
          <b>
            <small>{dataUser?.userName}</small>
          </b>
          <br />
          <small className="text-muted">{splitDate(dataPost?.createdAt)}</small>
        </div>
      </div>
      <div>
        <ButtonFollow userIdBeFollow={dataUser?._id} />
      </div>
    </div>
  );
});
