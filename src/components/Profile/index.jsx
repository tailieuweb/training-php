import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
import { useDispatch, useSelector } from "react-redux";
import { toast } from "react-toastify";
import {
  actDeletePost,
  actEditPost,
  actLoadPosts,
} from "../../redux/actions/postsActions";
import PostsDelete from "../Posts/PostsDelete";
import PostsEdit from "../Posts/PostsEdit";
import ProfilePostItem from "./ProfilePostItem";
import ProfilePostSkeleton from "./ProfilePostSkeleton";
import ProfileUser from "./ProfileUser";
import ProfileUserSkeleton from "./ProfileUserSkeleton";

const inputPost = { id: "", title: "", description: "" };

export default function Profile() {
  const { t } = useTranslation("common");

  // Redux
  const dispatch = useDispatch();
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;
  const selectorPosts = useSelector((state) => state.posts);
  const postsBase = selectorPosts?.posts;

  // React
  const [isLoading, setIsLoading] = useState(true);
  const [posts, setPosts] = useState([]);
  const [postSelected, setPostSelected] = useState(inputPost);

  useEffect(() => {
    (async () => {
      await dispatch(actLoadPosts());
      setIsLoading(false);
    })();
  }, []);

  useEffect(() => {
    const postsData = [...postsBase].filter((o) => o.user_id === user?.id);
    setPosts(postsData);
  }, [user, postsBase]);

  const onChange = (e) => {
    const { name, value } = e.target;
    setPostSelected({ ...postSelected, [name]: value });
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

  return (
    <div className="row mt-4">
      <PostsEdit
        postSelected={postSelected}
        onChange={onChange}
        onEditPost={onEditPost}
      />
      <PostsDelete postSelected={postSelected} onDeletePost={onDeletePost} />
      <div className="col-12 col-md-4">
        {isLoading ? <ProfileUserSkeleton /> : <ProfileUser user={user} />}
      </div>
      <div className="col-12 col-md-8 mt-5 mt-md-0">
        {isLoading &&
          [...Array(5).keys()].map((item) => (
            <ProfilePostSkeleton key={item} />
          ))}
        {posts.map((post) => (
          <ProfilePostItem
            key={post.id}
            post={post}
            onSelectPost={() => setPostSelected(post)}
          />
        ))}
      </div>
    </div>
  );
}
