import authReducer from "./authReducer";
import commonReducer from "./commonReducer";
import counterReducer from "./counterReducer";
import postsReducer from "./postsReducer";
import { combineReducers } from "redux";

const rootReducer = combineReducers({
  auth: authReducer,
  common: commonReducer,
  counter: counterReducer,
  posts: postsReducer,
});

export default rootReducer;
