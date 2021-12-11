import React, { memo } from "react";
import NotFound from "../Find/NotFound";
import PostProfile from "./PostProfile";
//--------------------------------------------------
export default memo(function PostsProfile({ infoUser }) {
  //--------------------------------------------------
  return (
    <main className="py-5">
      <div className="row" data-masonry='{"percentPosition": true }'>
        {infoUser?.posts?.length ? (
          infoUser?.posts?.map((val) => (
            <PostProfile key={val._id} dataPost={val} />
          ))
        ) : (
          <NotFound />
        )}
      </div>
    </main>
  );
});
