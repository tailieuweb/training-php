import React, { memo, useEffect, useState } from "react";
import User from "./User";
import getQueryFromURL from "../../helpers/getQueryFromURL";
import NotFound from "./NotFound";
import getData from "../../helpers/fetchs/getData";
import SpinnerBootstrap from "../../components/SpinnerBootstrap";
//--------------------------------------------------
export default memo(function Users() {
  //--------------------------------------------------
  const userName = getQueryFromURL("user_name");
  const [usersFind, setUsersFind] = useState([]);
  const [isLoading, setIsLoading] = useState(true);
  //--------------------------------------------------
  useEffect(() => {
    getData(import.meta.env.VITE_ENDPOINT_FIND_USER_BY_NAME + "/" + userName)
      .then((res) => res.json())
      .then((data) => {
        setUsersFind(data.users);
        setIsLoading(false);
      })
      .catch((err) => console.log(err));
  }, [userName]);
  //--------------------------------------------------
  return isLoading ? (
    <SpinnerBootstrap />
  ) : (
    <div className="container mt-4">
      <div className="row">
        {usersFind.length && userName ? (
          usersFind.map((val) => (
            <User
              key={val._id}
              userId={val._id}
              pathAvatar={val.pathAvatar}
              userName={val.userName}
            />
          ))
        ) : (
          <NotFound />
        )}
      </div>
    </div>
  );
});
