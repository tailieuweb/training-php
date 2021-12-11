import React, { useContext, memo, useState, useEffect } from "react";
import { BsCaretUp, BsCaretUpFill } from "react-icons/bs";
import { AppContext } from "../../../../contexts/AppProvider";
import { AuthContext } from "../../../../contexts/AuthProvider";
import SpinnerBootstrap from "../../../../components/SpinnerBootstrap";
import putData from "../../../../helpers/fetchs/putData";
import getUserIdFromAccessToken from "../../../../helpers/getUserIdFromAccessToken";
//--------------------------------------------------
export default memo(function Like({
  like,
  setLike,
  dislike,
  setDislike,
  numberOfLike,
  setNumberOfLike,
  isLoading,
  setIsLoading,
  dataPost,
  isUserLiked,
  setIsUserLiked,
  isUserDisliked,
  setIsUserDisliked,
  numberOfDislike,
  setNumberOfDislike,
}) {
  const { setShowModalLogin } = useContext(AppContext);
  const { stateAccessToken } = useContext(AuthContext);
  //--------------------------------------------------
  const handleSetLike = () => {
    if (stateAccessToken) {
      setIsLoading(true);
      putData(
        import.meta.env.VITE_ENDPOINT_LIKE_POST,
        {
          "Content-Type": "application/json",
          Authorization: "Bearer " + stateAccessToken,
        },
        JSON.stringify({
          userId: getUserIdFromAccessToken(stateAccessToken),
          postId: dataPost?._id,
        })
      )
        .then((res) => res.json())
        .then((data) => {
          switch (data?.message) {
            case "liked":
              setLike(true);
              setIsUserLiked(true);
              setNumberOfLike(numberOfLike + 1);
              break;
            case "unliked":
              setLike(false);
              setIsUserLiked(false);
              setNumberOfLike(numberOfLike - 1);
              break;
            case "liked and undisliked":
              setLike(true);
              setIsUserLiked(true);
              setNumberOfLike(numberOfLike + 1);
              // //----
              setDislike(false);
              setIsUserDisliked(false);
              setNumberOfDislike(numberOfDislike - 1);
              break;
            default:
              break;
          }
          setIsLoading(false);
        })
        .catch((err) => {
          console.log(err);
          setIsLoading(false);
        });
    } else setShowModalLogin(true);
  };
  //--------------------------------------------------
  return isLoading ? (
    <SpinnerBootstrap />
  ) : (
    <div onClick={() => handleSetLike()}>
      {isUserLiked ? (
        <small className="text-primary">{numberOfLike}</small>
      ) : like ? (
        <small className="text-primary">{numberOfLike}</small>
      ) : (
        <small className="text-muted">{numberOfLike}</small>
      )}
      {isUserLiked ? (
        <BsCaretUpFill size="40" role="button" className="text-primary" />
      ) : like ? (
        <BsCaretUpFill size="40" role="button" className="text-primary" />
      ) : (
        <BsCaretUp size="40" role="button" className="text-muted" />
      )}
    </div>
  );
});
