import React, { useState, useContext, memo } from "react";
import { AppContext } from "../contexts/AppProvider";
import { AuthContext } from "../contexts/AuthProvider";
import SpinnerBootstrap from "./SpinnerBootstrap";
import putData from "../helpers/fetchs/putData";
import getUserIdFromAccessToken from "../helpers/getUserIdFromAccessToken";
//--------------------------------------------------
export default memo(function ButtonFollow({ userIdBeFollow }) {
  const { setShowModalLogin, stateObInfoUserCurrent } = useContext(AppContext);
  const [statusFollow, setStatusFollow] = useState(
    stateObInfoUserCurrent?.followings?.includes(userIdBeFollow)
      ? "Following"
      : "Follow"
  );
  const [isLoading, setIsLoading] = useState(false);
  const { stateAccessToken } = useContext(AuthContext);
  const userIdCurrent = getUserIdFromAccessToken(stateAccessToken);
  //--------------------------------------------------
  const handleFollow = () => {
    if (stateAccessToken) {
      setIsLoading(true);
      putData(
        import.meta.env.VITE_ENDPOINT_FOLLOW_AND_UNFOLLOW,
        {
          "Content-Type": "application/json",
          Authorization: "Bearer " + stateAccessToken,
        },
        JSON.stringify({
          userIdFollow: userIdCurrent,
          userIdBeFollow,
        })
      )
        .then((res) => res.json())
        .then((data) => {
          setIsLoading(false);
          data.message === "User was followed"
            ? setStatusFollow("Following")
            : setStatusFollow("Follow");
        });
    } else {
      setShowModalLogin(true);
    }
  };
  //--------------------------------------------------
  return (
    userIdBeFollow !== stateObInfoUserCurrent?._id && (
      <div
        role="button"
        className={statusFollow === "Follow" ? "p-1 text-primary" : "p-1"}
        onClick={() => handleFollow()}
        style={{
          userSelect: "none",
        }}
      >
        {isLoading ? <SpinnerBootstrap /> : statusFollow}
      </div>
    )
  );
});
