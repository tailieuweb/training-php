import React, { useState, memo, useEffect, useContext } from "react";
import { AuthContext } from "../../../../contexts/AuthProvider";
import Dislike from "./Dislike";
import Like from "./Like";
import getUserIdFromAccessToken from "../../../../helpers/getUserIdFromAccessToken";
//--------------------------------------------------
export default memo(function Actions({ dataPost }) {
  const [like, setLike] = useState(false);
  const [dislike, setDislike] = useState(false);
  const [numberOfLike, setNumberOfLike] = useState(dataPost.likes.length);
  const [numberOfDislike, setNumberOfDislike] = useState(
    dataPost.dislikes.length
  );
  const [isLoading, setIsLoading] = useState(false);
  const { stateAccessToken } = useContext(AuthContext);
  const [isUserLiked, setIsUserLiked] = useState(
    dataPost?.likes.includes(getUserIdFromAccessToken(stateAccessToken))
  );
  const [isUserDisliked, setIsUserDisliked] = useState(
    dataPost?.dislikes.includes(getUserIdFromAccessToken(stateAccessToken))
  );
  //--------------------------------------------------
  return (
    <div
      className="d-flex justify-content-around m-2"
      style={{ userSelect: "none" }}
    >
      <Like
        like={like}
        setLike={setLike}
        dislike={dislike}
        setDislike={setDislike}
        numberOfLike={numberOfLike}
        setNumberOfLike={setNumberOfLike}
        isLoading={isLoading}
        setIsLoading={setIsLoading}
        dataPost={dataPost}
        isUserLiked={isUserLiked}
        setIsUserLiked={setIsUserLiked}
        isUserDisliked={isUserDisliked}
        setIsUserDisliked={setIsUserDisliked}
        numberOfDislike={numberOfDislike}
        setNumberOfDislike={setNumberOfDislike}
      />
      <Dislike
        like={like}
        setLike={setLike}
        dislike={dislike}
        setDislike={setDislike}
        numberOfDislike={numberOfDislike}
        setNumberOfDislike={setNumberOfDislike}
        isLoading={isLoading}
        setIsLoading={setIsLoading}
        dataPost={dataPost}
        isUserLiked={isUserLiked}
        setIsUserLiked={setIsUserLiked}
        isUserDisliked={isUserDisliked}
        setIsUserDisliked={setIsUserDisliked}
        numberOfLike={numberOfLike}
        setNumberOfLike={setNumberOfLike}
      />
    </div>
  );
});
