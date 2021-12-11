import { useRouter } from "next/dist/client/router";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import {
  actLoadPosts,
  actLoadPostById,
} from "../../redux/actions/postsActions";
import { shuffleArr } from "../../utils/commonFunctions";
import PostsDetailContent from "./PostsDetailContent";
import PostsDetailContentSkeleton from "./PostsDetailContentSkeleton";
import PostsDetailRelate from "./PostsDetailRelate";
import PostsDetailRelateSkeleton from "./PostsDetailRelateSkeleton";

export default function PostsDetail() {
  const router = useRouter();
  const { id = 0 } = router.query;

  //Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  //UseState
  const [isLoading, setIsLoading] = useState(true);
  const [post, setPost] = useState(null);
  const [posts, setPosts] = useState([]);

  //UseEffect
  useEffect(() => {
    if (id === 0) {
      return;
    }

    (async () => {
      const post = await dispatch(actLoadPostById(id));
      if (!post) {
        return router.replace("/404");
      }
      setPost(post);
    })();
  }, [id]);

  useEffect(() => {
    (async () => {
      await dispatch(actLoadPosts());
      setIsLoading(false);
    })();
  }, []);

  useEffect(() => {
    const postsData = shuffleArr(postsBase).splice(0, 6);
    setPosts(postsData);
  }, [postsBase]);

  return (
    <div className="row mt-4">
      <div className="col-12">
        {post && <PostsDetailContent post={post} />}
        {!post && <PostsDetailContentSkeleton />}
      </div>
      <div className="col-12">
        <PostsDetailRelate posts={posts} />
        {isLoading && <PostsDetailRelateSkeleton />}
      </div>
    </div>
  );
}
