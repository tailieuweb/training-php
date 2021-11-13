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

export const actSearchPost = (post) => {
  return (dispatch) => {
    const { title, description, user_id = 0 } = post;
    const data = { title, description, user_id };
    return apiCaller(`products`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(actLoadPosts());
          toast.success("successfully!");
        }
      })
      .catch(() => toast.error("error!"));
  };
};