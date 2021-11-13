import { useRouter } from "next/dist/client/router";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
  actLoadPosts,
  actLoadPostById,
} from "../../redux/actions/postsActions";
import { shuffleArr } from "../../utils/commonFunctions";
import PostsDetailContent from "./PostsDetailContent";
import PostsDetailRelate from "./PostsDetailRelate";

export default function PostsDetail() {
  const router = useRouter();
  const { id = 0 } = router.query;
  //Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  //UseState
  const [posts, setPosts] = useState([]);
  const [post, setPost] = useState();

  //UseEffect
  useEffect(() => {
    if (id === 0) {
      return;
    }
    (async () => {
      const post = await dispatch(actLoadPostById(id));
      setPost(post);
    })();
  }, [id]);

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
        <PostsDetailContent post={post} />
      </div>
      <div className="col-12 col-md-4">
        <PostsDetailRelate posts={posts} />
      </div>
    </div>
  );
}
