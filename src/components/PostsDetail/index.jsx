import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { actLoadPosts } from "../../redux/actions/postsActions";
import { shuffleArr } from "../../utils/commonFunctions";
import PostsDetailContent from "./PostsDetailContent";
import PostsDetailRelate from "./PostsDetailRelate";

export default function PostsDetail() {
  //Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  //UseState
  const [posts, setPosts] = useState([]);

  //UseEffect
  useEffect(() => {
    (async () => {
      await dispatch(actLoadPosts());
    })();
  }, []);

  useEffect(() => {
    const postsData = shuffleArr(postsBase).splice(0, 3);
    setPosts(postsData);
  }, [postsBase]);

  return (
    <div className="row mt-4">
      <div className="col-12 col-md-8">
        <PostsDetailContent />
      </div>
      <div className="col-12 col-md-4">
        <PostsDetailRelate posts={posts} />
      </div>
    </div>
  );
}
