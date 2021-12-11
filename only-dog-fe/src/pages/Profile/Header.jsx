import React, { memo, useState, useEffect } from "react";
import ButtonFollow from "../../components/ButtonFollow";
import ModalImage from "../../components/Modal/ModalImage";
import Placeholder from "../../components/Placeholder";
import avatarUser from "../../assets/images/avatarDefault.png";
import splitDate from "../../helpers/splitDate";
//--------------------------------------------------
export default memo(function Header({ infoUser }) {
  const [loaded, setLoaded] = useState(false);
  //--------------------------------------------------
  return (
    <div>
      <div className="row p-5">
        <div className="col-md-4 text-center">
          <ModalImage
            component={
              <>
                <img
                  src={
                    infoUser?.pathAvatar
                      ? import.meta.env.VITE_DOMAIN_API + infoUser?.pathAvatar
                      : avatarUser
                  }
                  alt=""
                  width="200"
                  height="200"
                  role="button"
                  style={{ objectFit: "cover", userSelect: "none" }}
                  onLoad={() => setLoaded(true)}
                  className={loaded ? "rounded-circle" : "d-none"}
                />
                {!loaded && (
                  <Placeholder rounded={true} width={200} height={200} />
                )}
              </>
            }
            endpoint={import.meta.env.VITE_ENDPOINT_CHANGE_AVATAR_USER}
          />
        </div>
        <div className="col-md-8" style={{ marginTop: 30 }}>
          <h3 className="text-center mb-2">{infoUser?.userName}</h3>
          <div className="row">
            <p className="col-sm-4 col-12 text-center">
              <b>{infoUser?.posts?.length}</b> posts
            </p>
            <p className="col-sm-4 col-12 text-center">
              <b>{infoUser?.followers?.length}</b> followers
            </p>
            <p className="col-sm-4 col-12 text-center">
              <b>{infoUser?.followings?.length}</b> followings
            </p>
          </div>
          <div className="text-center mb-2 text-muted">
            Join dated: {splitDate(infoUser?.createdAt)}
          </div>
          <div className="text-center">
            <ButtonFollow userIdBeFollow={infoUser?._id} />
          </div>
        </div>
      </div>
    </div>
  );
});
