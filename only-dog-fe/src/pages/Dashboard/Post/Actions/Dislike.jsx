import React, { useContext, memo, useState } from "react";
import { BsCaretDown, BsCaretDownFill } from "react-icons/bs";
import { AppContext } from "../../../../contexts/AppProvider";
import { AuthContext } from "../../../../contexts/AuthProvider";
import SpinnerBootstrap from "../../../../components/SpinnerBootstrap";
import putData from "../../../../helpers/fetchs/putData";
import getUserIdFromAccessToken from "../../../../helpers/getUserIdFromAccessToken";
//--------------------------------------------------
export default memo(function Dislike({
  like,
  setLike,
  dislike,
  setDislike,
  numberOfDislike,
  setNumberOfDislike,
  isLoading,
  setIsLoading,
  dataPost,
  isUserLiked,
  setIsUserLiked,
  isUserDisliked,
  setIsUserDisliked,
  numberOfLike,
  setNumberOfLike,
}) {
  const { setShowModalLogin } = useContext(AppContext);
  const { stateAccessToken } = useContext(AuthContext);
  //--------------------------------------------------
  const handleSetDislike = () => {
    if (stateAccessToken) {
      setIsLoading(true);
      putData(
        import.meta.env.VITE_ENDPOINT_DISLIKE_POST,
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
            case "disliked":
              setDislike(true);
              setIsUserDisliked(true);
              setNumberOfDislike(numberOfDislike + 1);
              break;
            case "undisliked":
              setDislike(false);
              setIsUserDisliked(false);
              setNumberOfDislike(numberOfDislike - 1);
              break;
            case "disliked and unliked":
              setDislike(true);
              setIsUserDisliked(true);
              setNumberOfDislike(numberOfDislike + 1);
              //--
              setLike(false);
              setIsUserLiked(false);
              setNumberOfLike(numberOfLike - 1);
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
    <div onClick={() => handleSetDislike()}>
      {isUserDisliked ? (
        <small className="text-danger">{numberOfDislike}</small>
      ) : dislike ? (
        <small className="text-danger">{numberOfDislike}</small>
      ) : (
        <small className="text-muted">{numberOfDislike}</small>
      )}
      {isUserDisliked ? (
        <BsCaretDownFill size="40" role="button" className="text-danger" />
      ) : dislike ? (
        <BsCaretDownFill size="40" role="button" className="text-danger" />
      ) : (
        <BsCaretDown size="40" role="button" className="text-muted" />
      )}
    </div>
  );
});
