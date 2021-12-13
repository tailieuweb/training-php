import { combineReducers } from "redux";
import {
  featurepostReducer,
  getPostByCategoryReducer,
  getCategoriesReducer,
  getFeaturePostReducer,
  getDetailPostReducer,
} from "./listpost";
import { getProfileReducer } from "./profile";
import {
  getAllCategorieReducer,
  getRelatedPostReducer,
  getFeatureMemberReducer,
  getCommentReducer,
  postCommentReducer,
} from "./getdata";
import CRUDPostReducer from "./CRUDpost";
import authReducer from "./auth";
// eslint-disable-next-line
export default combineReducers({
  featurepostReducer,
  getPostByCategoryReducer,
  getCategoriesReducer,
  getFeaturePostReducer,
  getProfileReducer,
  getAllCategorieReducer,
  CRUDPostReducer,
  getDetailPostReducer,
  getCommentReducer,
  postCommentReducer,
  authReducer,
  getRelatedPostReducer,
  getFeatureMemberReducer,
});
