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

export const actEditPost = (post) => {
  return (dispatch) => {
    return apiCaller(`products/${post.id}`, "POST", null).then((res) => {
      if (res.success) {
        dispatch(actLoadPosts());
      }
    });
  };
};

export const actDeletePost = (post) => {
  return (dispatch) => {};
};
