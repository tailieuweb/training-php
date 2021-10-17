import { useRouter } from "next/dist/client/router";
import { useEffect, useState } from "react";
import apiCaller from "../../utils/apiCaller";
import Pagination from "../Base/Pagination";
import PostsAddForm from "./PostsAddForm";
import PostsDelete from "./PostsDelete";
import PostsItem from "./PostsItem";

const ITEM_PER_PAGE = 5;

export default function Posts() {
  const router = useRouter();
  const { pageNum } = router.query;

  const [posts, setPosts] = useState([]);
  const [postsBase, setPostsBase] = useState([]);
  const [postSelected, setPostSelected] = useState([]);

  useEffect(() => {
    apiCaller("products").then((res) => {
      if (res.success) {
        const postsData = res.data.reverse();
        setPosts(
          postsData.splice((pageNum - 1) * ITEM_PER_PAGE, ITEM_PER_PAGE)
        );
        setPostsBase(postsData);
      }
    });
  }, []);

  useEffect(() => {
    const postsData = [...postsBase].splice(
      (pageNum - 1) * ITEM_PER_PAGE,
      ITEM_PER_PAGE
    );
    setPosts(postsData);
  }, [pageNum]);

  const onDeletePost = () => {};

  return (
    <div className="row mt-4">
      <PostsDelete postSelected={postSelected} onDeletePost={onDeletePost} />
      <div className="col-md-6">
        <PostsAddForm />
      </div>
      {posts.map((post) => (
        <div key={post.id} className="col-md-6">
          <PostsItem post={post} onSelectPost={() => setPostSelected(post)} />
        </div>
      ))}
      <div className="col-md-12">
        {posts.length > 0 && (
          <Pagination
            baseUrl="/posts"
            maxSize={postsBase.length}
            itemSize={ITEM_PER_PAGE}
          />
        )}
      </div>
    </div>
  );
}
