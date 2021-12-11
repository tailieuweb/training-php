import React, { memo, useState, useEffect } from "react";
import Header from "./Header";
import PostsProfile from "./PostsProfile";
import getQueryFromURL from "../../helpers/getQueryFromURL";
import SpinnerBootstrap from "../../components/SpinnerBootstrap";
import getData from "../../helpers/fetchs/getData";
//--------------------------------------------------
export default memo(function Profile() {
  const userId = getQueryFromURL("user_id");
  const [infoUser, setInfoUser] = useState({});
  const [isLoading, setIsLoading] = useState(true);
  //--------------------------------------------------
  useEffect(() => {
    userId &&
      getData(import.meta.env.VITE_ENDPOINT_FIND_USER_BY_ID + "/" + userId)
        .then((res) => res.json())
        .then((data) => {
          setInfoUser(data);
          setIsLoading(false);
        })
        .catch((err) => console.log(err));
    return () => {
      setInfoUser({});
      setIsLoading(true);
    };
  }, [userId]);
  //--------------------------------------------------
  return isLoading ? (
    <SpinnerBootstrap />
  ) : (
    <div className="container">
      <Header infoUser={infoUser?.user} />
      <PostsProfile infoUser={infoUser?.user} />
    </div>
  );
});
