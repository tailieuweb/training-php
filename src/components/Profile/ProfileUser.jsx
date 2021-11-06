import { useEffect, useState } from "react";

export default function ProfileUser() {
  const [avatarHash, setAvatarHash] = useState();

  useEffect(() => {
    const md5Hash = CryptoJS.MD5("tronghieu60s@gmail.com");
    setAvatarHash(md5Hash);
  }, [])

  return (
    <div>
      <a
        href="https://gravatar.com/"
        className="avatar"
        style={{ width: "150px", height: "150px" }}
      >
        <img
          alt="Image placeholder"
          src={`https://www.gravatar.com/avatar/${avatarHash}?s=150`}
        />
      </a>
      <div className="mt-3">
        <a>
          <h2 className="card-title mb-0">John Doe</h2>
        </a>
        <small className="card-text d-block mt-1">
          <i className="fa fa-envelope" aria-hidden="true"></i>{" "}
          tronghieu60s@gmail.com
        </small>
      </div>
    </div>
  );
}
