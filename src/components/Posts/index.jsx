import { useEffect, useState } from "react";
import apiCaller from "../../utils/apiCaller";
import PostsAddForm from "./PostsAddForm";
import PostsDelete from "./PostsDelete";
import PostsItem from "./PostsItem";

export default function Posts() {
  const [posts, setPosts] = useState([]);
  const [postsBase, setPostsBase] = useState([]);
  const [postSelected, setPostSelected] = useState([]);

  useEffect(() => {
    apiCaller("products").then((res) => {
      if (res.success) {
        const postsData = res.data.reverse();
        setPosts(postsData);
        setPostsBase(postsData);
      }
    });
  }, []);

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
    </div>
  );
}
