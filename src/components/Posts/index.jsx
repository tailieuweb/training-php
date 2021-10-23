import { useRouter } from "next/dist/client/router";
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { toast } from "react-toastify";
import {
  actAddPost,
  actDeletePost,
  actEditPost,
  actLoadPosts,
} from "../../redux/actions/postsActions";
import Pagination from "../Base/Pagination";
import PostsAdd from "./PostsAdd";
import PostsAddItem from "./PostsAddItem";
import PostsDelete from "./PostsDelete";
import PostsEdit from "./PostsEdit";
import PostsItem from "./PostsItem";

const ITEM_PER_PAGE = 5;
const inputPost = { id: "", title: "", description: "" };

export default function Posts() {
  // Next
  const router = useRouter();
  const { pageNum = 1 } = router.query;

  // Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;

  // State React
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState(inputPost);

  // Effect
  useEffect(() => dispatch(actLoadPosts()), []);

  useEffect(() => {
    const postsData = [...postsBase].splice(
      (pageNum - 1) * ITEM_PER_PAGE,
      ITEM_PER_PAGE
    );
    setPosts(postsData);
  }, [pageNum, postsBase]);

  // Functions
  const onChange = (e) => {
    const { name, value } = e.target;
    setPostSelected({ ...postSelected, [name]: value });
  };

  const onAddPost = async (e) => {
    e.preventDefault();
    const { title, description } = postSelected;
    if (title.length === 0 || description.length === 0) {
      return toast.warning("Please enter the full information.");
    }

    // request and close modal
    await dispatch(actAddPost(postSelected));
    document.querySelector("#addModal button[data-dismiss='modal']").click();
  };

  const onEditPost = async (e) => {
    e.preventDefault();

    if (postSelected?.user_id !== user?.id) {
      return;
    }

    const { title, description } = postSelected;
    if (title.length === 0 || description.length === 0) {
      return toast.warning("Please enter the full information.");
    }

    // request and close modal
    await dispatch(actEditPost(postSelected));
    document.querySelector("#editModal button[data-dismiss='modal']").click();
  };

  const onDeletePost = async (e) => {
    e.preventDefault();
    // request and close modal
    await dispatch(actDeletePost(postSelected));
    document.querySelector("#deleteModal button[data-dismiss='modal']").click();
  };

  // Render
  return (
    <div className="row mt-4">
      <PostsAdd
        postSelected={postSelected}
        onChange={onChange}
        onAddPost={onAddPost}
      />
      <PostsEdit
        postSelected={postSelected}
        onChange={onChange}
        onEditPost={onEditPost}
      />
      <PostsDelete postSelected={postSelected} onDeletePost={onDeletePost} />
      {parseInt(pageNum) === 1 && (
        <div className="col-md-6">
          <PostsAddItem user={user} />
        </div>
      )}
      {posts.map((post) => (
        <div key={post.id} className="col-md-6">
          <PostsItem
            user={user}
            post={post}
            onSelectPost={() => setPostSelected(post)}
          />
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
