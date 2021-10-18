import authReducer from "./authReducer";
import counterReducer from "./counterReducer";
import postsReducer from "./postsReducer";
import { combineReducers } from "redux";

const rootReducer = combineReducers({
  auth: authReducer,
  counter: counterReducer,
  posts: postsReducer,
});

export default rootReducer;
