import { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import { actLoadPosts } from "../../redux/actions/postsActions";
import PostsAddForm from "./PostsAddForm";
import PostsDelete from "./PostsDelete";
import PostsItem from "./PostsItem";

export default function Posts() {
  const dispatch = useDispatch();
  // const posts = useSelector(state => state.posts)
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState([]);

  useEffect(() => {
    dispatch(actLoadPosts());
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
