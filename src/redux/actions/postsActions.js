import { toast } from "react-toastify";
import apiCaller from "../../utils/apiCaller";

//Action Types
export const SET_POSTS = "LOAD_POSTS";

//Action Creator
export const setPosts = (posts) => ({ type: SET_POSTS, posts });

// Action Load Posts
export const actLoadPosts = () => {
  return (dispatch) => {
    return apiCaller("products", "GET", null).then((res) => {
      if (res.success) {
        const postsData = res.data.reverse();
        dispatch(setPosts(postsData));
      }
    });
  };
};

export const actAddPost = (post) => {
  return (dispatch) => {
    const { title, description } = post;
    const data = { title, description };
    return apiCaller(`products`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(actLoadPosts());
          toast.success("Add post successfully!");
        }
      })
      .catch(() => toast.error("An error occurred!"));
  };
};

export const actEditPost = (post) => {
  return (dispatch) => {
    const { title, description } = post;
    const data = { title, description };
    return apiCaller(`products/${post.id}`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(actLoadPosts());
          toast.success("Edit post successfully!");
        }
      })
      .catch(() => toast.error("An error occurred!"));
  };
};

export const actDeletePost = (post) => {
    return (dispatch) => {
      return apiCaller(`products/${post.id}`, "DELETE", null)
        .then((res) => {
          if (res.success) {
            dispatch(actLoadPosts());
            toast.success("Delete post successfully!");
          }
        })
        .catch(() => toast.error("An error occurred!"));
  };
};
