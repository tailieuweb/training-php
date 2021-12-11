import React, { memo, useState, useLayoutEffect, useContext } from "react";
import Suggestions from "./Suggestions/Suggestions";
import Post from "./Post/Post";
import InfiniteScroll from "react-infinite-scroll-component";
import SpinnerBootstrap from "../../components/SpinnerBootstrap";
import getUserIdFromAccessToken from "../../helpers/getUserIdFromAccessToken";
import { AuthContext } from "../../contexts/AuthProvider";
import getData from "../../helpers/fetchs/getData";
//--------------------------------------------------
const PER_PAGE = import.meta.env.VITE_PER_PAGE;
//--------------------------------------------------
export default memo(function DashBoard() {
  const { stateAccessToken } = useContext(AuthContext);
  const [stateAllPostUserFollow, setStateAllPostUserFollow] = useState([]); //all post
  const [statePostsUserFollow, setStatePostsUserFollow] = useState([]); //part post
  const [stateHasMore, setStateHasMore] = useState(true);
  const [isLoading, setIsLoading] = useState(true);
  //--------------------------------------------------
  const fetchMoreData = () => {
    if (statePostsUserFollow.length >= stateAllPostUserFollow.length) {
      setStateHasMore(false);
      return;
    }
    setStatePostsUserFollow(
      stateAllPostUserFollow.slice(0, statePostsUserFollow.length + 6)
    );
  };
  //--------------------------------------------------
  useLayoutEffect(() => {
    stateAccessToken
      ? getData(
          import.meta.env.VITE_ENDPOINT_DASHBOARD +
            "/" +
            getUserIdFromAccessToken(stateAccessToken)
        )
          .then((res) => res.json())
          .then((data) => {
            //xu ly data
            data.posts.map((valPost) => {
              const postId = valPost._id;
              data.users.map((valUser) => {
                if (valUser.posts.includes(postId)) valPost.user = valUser;
              });
            });
            //----------------------------------------------------
            setStateAllPostUserFollow(data.posts.reverse());
            setStatePostsUserFollow(data.posts.slice(0, PER_PAGE));
            setIsLoading(false);
          })
          .catch((err) => console.log(err))
      : getData(import.meta.env.VITE_ENDPOINT_GET_ALL_POST)
          .then((res) => res.json())
          .then((data) => {
            //xu ly data
            data.posts.map((valPost) => {
              const postId = valPost._id;
              data.users.map((valUser) => {
                if (valUser.posts.includes(postId)) valPost.user = valUser;
              });
            });
            //-----------
            setStateAllPostUserFollow(data.posts.reverse());
            setStatePostsUserFollow(data.posts.slice(0, PER_PAGE));
            setIsLoading(false);
          })
          .catch((err) => console.log(err));
    return () => {
      setStateAllPostUserFollow([]);
      setStatePostsUserFollow([]);
      setIsLoading(true);
    };
  }, []);
  //--------------------------------------------------
  return isLoading ? (
    <SpinnerBootstrap />
  ) : (
    <div>
      <Suggestions />
      <main className="container">
        <InfiniteScroll
          dataLength={statePostsUserFollow.length}
          next={() => fetchMoreData()}
          hasMore={stateHasMore}
          className="row"
          data-masonry='{"percentPosition": true }'
          style={{ overflowY: "hidden" }}
        >
          {statePostsUserFollow.map((val, index) => (
            <Post key={index} dataPost={val} />
          ))}
        </InfiniteScroll>
      </main>
    </div>
  );
});
