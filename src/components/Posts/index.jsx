import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
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
import PostsItemSkeleton from "./PostsItemSkeleton";

const ITEM_PER_PAGE = 6;
const inputPost = { id: "", title: "", description: "" };

export default function Posts() {
  const { t } = useTranslation("common");

  // Next
  const router = useRouter();
  const { page = 1, q = "" } = router.query;

  // Redux
  const dispatch = useDispatch();
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;

  // State React
  const [isLoading, setIsLoading] = useState(true);
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState(inputPost);

  // Effect
  useEffect(() => {
    (async () => {
      await dispatch(actLoadPosts());
      setIsLoading(false);
    })();
  }, []);

  useEffect(() => {
    let postsData = [...postsBase].filter((o) =>
      o.title.toLowerCase().includes(q.toLowerCase())
    );
    postsData = postsData.splice((page - 1) * ITEM_PER_PAGE, ITEM_PER_PAGE);
    setPosts(postsData);
  }, [page, q, postsBase]);

  // Functions
  const onChange = (e) => {
    const { name, value } = e.target;
    setPostSelected({ ...postSelected, [name]: value });
  };

  const onAddPost = async (e) => {
    e.preventDefault();
    const { title, description } = postSelected;
    if (title.length === 0 || description.length === 0) {
      return toast.warning(t("app.toast.requiredInput"));
    }

    // request and close modal
    await dispatch(actAddPost({ ...postSelected, user_id: user?.id }, t));
    setPostSelected(inputPost);
    document.querySelector("#addModal button[data-dismiss='modal']").click();
  };

  const onEditPost = async (e) => {
    e.preventDefault();

    if (postSelected?.user_id !== user?.id) {
      return;
    }

    const { title, description } = postSelected;
    if (title.length === 0 || description.length === 0) {
      return toast.warning(t("app.toast.requiredInput"));
    }

    // request and close modal
    await dispatch(actEditPost({ ...postSelected, user_id: user?.id }, t));
    setPostSelected(inputPost);
    document.querySelector("#editModal button[data-dismiss='modal']").click();
  };

  const onDeletePost = async (e) => {
    e.preventDefault();

    if (postSelected?.user_id !== user?.id) {
      return;
    }

    // request and close modal
    await dispatch(actDeletePost(postSelected, t));
    setPostSelected(inputPost);
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
      {q === ""
        ? parseInt(page) === 1 && (
            <div className="col-md-12">
              <PostsAddItem user={user} />
            </div>
          )
        : null}
      {[...Array(5).keys()].map((item) => (
        <div key={item} className={`col-md-6 ${isLoading ? "" : "d-none"}`}>
          <PostsItemSkeleton />
        </div>
      ))}
      {posts.map((post) => (
        <div key={post.id} className={`col-md-6 ${isLoading ? "d-none" : ""}`}>
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
