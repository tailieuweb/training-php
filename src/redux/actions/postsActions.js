import { toast } from "react-toastify";
import apiCaller from "../../utils/apiCaller";
import { startLoading, stopLoading } from "./commonActions";

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

export const actLoadPostById = (id) => {
  return () => {
    return apiCaller(`products/${id}`, "GET", null).then((res) => {
      if (res.success) {
        return res.data;
      }
    });
  };
};

export const actAddPost = (post) => {
  return (dispatch) => {
    dispatch(startLoading());
    const { title, description, user_id = 0 } = post;
    const data = { title, description, user_id };
    return apiCaller(`products`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(actLoadPosts());
          toast.success("Add post successfully!");
        }
      })
      .catch(() => toast.error("An error occurred!"))
      .finally(() => dispatch(stopLoading()));
  };
};

export const actEditPost = (post) => {
  return (dispatch) => {
    dispatch(startLoading());
    const { title, description, user_id = 0 } = post;
    const data = { title, description, user_id, category_id: 0 };
    return apiCaller(`products/${post.id}`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(actLoadPosts());
          toast.success("Edit post successfully!");
        }
      })
      .catch(() => toast.error("An error occurred!"))
      .finally(() => dispatch(stopLoading()));
  };
};

export const actDeletePost = (post) => {
  return (dispatch) => {
      dispatch(startLoading());
      return apiCaller(`products/${post.id}`, "DELETE", null)
        .then((res) => {
          if (res.success) {
            dispatch(actLoadPosts());
            toast.success("Delete post successfully!");
          }
        })
        .catch(() => toast.error("An error occurred!"))
        .finally(() => dispatch(stopLoading()));
  };
};
