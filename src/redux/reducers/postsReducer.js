import { SET_POSTS } from "../actions/postsActions";

const postsReducer = (state = { posts: null }, action) => {
  switch (action.type) {
    case SET_POSTS:
      return { ...state, posts: action.posts };
    default:
      return { ...state };
  }
};

export default postsReducer;
