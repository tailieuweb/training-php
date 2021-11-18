import { takeEvery } from "redux-saga/effects";
import * as actionTypes from "../actions";
import listpost from "./listpost";
import profile from "./profile";
import getdata from "./getdata";
import CRUDpost from "./CRUDpost";
import auth from "./auth";

function* rootSaga() {
  yield takeEvery(actionTypes.FEATUREPOST_REQUEST, listpost.featurepostSaga);
  /* getPostByCategory
   * Call Call api tất cả bài viết theo category
   * Lấy tất cả bà viết
   */
  yield takeEvery(
    actionTypes.GETPOSTBYCATEGORY_REQUEST,
    listpost.getPostByCategorySaga
  );
  //GET  CATEGORIES
  /* GET aLL  CATEGORIES
   * Call Call api tất cả category
   */
  yield takeEvery(
    actionTypes.GETCATEGORIES_REQUEST,
    listpost.getCategoriesSaga
  );
  yield takeEvery(
    actionTypes.GETFEATUREPOST_REQUEST,
    listpost.getFeaturePostSaga
  );
  yield takeEvery(actionTypes.GET_PROFILE_REQUEST, profile.getProfileSaga);
  // FEATURE UPDATE PROFILE
  yield takeEvery(
    actionTypes.UPDATE_PROFILE_REQUEST,
    profile.updateProfileSaga
  );
  /* GET detailPost
   *   Call api lấy chi tiết bài viết
   */
  yield takeEvery(
    actionTypes.GETDETAILPOST_REQUEST,
    listpost.getDetailPostSaga
  );
  // GET ALL CATEGORIES
  yield takeEvery(
    actionTypes.GET_ALL_CATEGORIE_REQUEST,
    getdata.getAllCategorieSaga
  );
  // CREATE POST
  yield takeEvery(actionTypes.CREATE_POST_REQUEST, CRUDpost.createPostSaga);
  // CHANGE PASSWORD
  yield takeEvery(actionTypes.CHANGE_PASSWORD_REQUEST, auth.changePasswordSaga);
  // GET LIST POST BY USER
  yield takeEvery(
    actionTypes.GET_LIST_POST_BY_USER_REQUEST,
    CRUDpost.getListPostByUserSaga
  );
  // DELETE POST
  yield takeEvery(actionTypes.DELETE_POST_REQUEST, CRUDpost.deletePostSaga);
  // UPDATE POST
  yield takeEvery(actionTypes.UPDATE_POST_REQUEST, CRUDpost.updatePostSaga);
}
export default rootSaga;
