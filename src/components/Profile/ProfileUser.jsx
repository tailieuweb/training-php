import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";

export default function ProfileUser(props) {
  const { user } = props;
  const { t } = useTranslation("common");
  const [avatarHash, setAvatarHash] = useState();

  useEffect(() => {
    const md5Hash = CryptoJS.MD5(user?.email);
    setAvatarHash(md5Hash);
  }, [user]);

  return (
    <div>
      {user?.email && (
        <a
          href="https://gravatar.com/"
          className="avatar"
          style={{ width: "200px", height: "200px" }}
          target="_blank"
        >
          <img
            alt="Image placeholder"
            src={`https://www.gravatar.com/avatar/${avatarHash}?s=200`}
          />
        </a>
      )}
      <div className="mt-3">
        {user?.email && (
          <a href="https://gravatar.com/" target="_blank">
            <button type="button" className="text-capitalize btn btn-primary btn-sm mb-3">
              {t("app.common.changeAvatar")}
            </button>
          </a>
        )}
        <h2 className="card-title mb-0">{user?.name}</h2>
        {user?.email && (
          <small className="card-text d-block mt-1">
            <i className="fa fa-envelope mr-1" aria-hidden="true"></i>{" "}
            <a style={{ color: "#000" }} href={`mailto:${user?.email}`}>
              {user?.email}
            </a>
          </small>
        )}
      </div>
    </div>
  );
}
