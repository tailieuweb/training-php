import { useState } from "react";
import PostsAddForm from "./PostsAddForm";
import PostsDelete from "./PostsDelete";
import PostsItem from "./PostsItem"; //Alt + Shift + O

export default function Posts() {
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState([]);

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
