import { put } from "redux-saga/effects";
import * as actionType from "../actions/index";
console.log(actionType);

// eslint-disable-next-line
export default {
  //GET ALL CATEGORIES
  getAllCategorieSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-all-categories",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GET_ALL_CATEGORIE_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GET_ALL_CATEGORIE_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GET_ALL_CATEGORIE_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GET_ALL_CATEGORIE_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET RELATED POST
  getRelatedPostSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-related-post",
        payload
        // true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GET_RELATED_POST_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GET_RELATED_POST_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GET_RELATED_POST_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GET_RELATED_POST_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET FeatureMember
  getFeatureMemberSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-members-hightlight",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GET_FEATURE_MEMBER_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GET_FEATURE_MEMBER_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GET_FEATURE_MEMBER_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GET_FEATURE_MEMBER_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET comment
  getCommentSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-rating-post",
        payload
        // true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GET_COMMENT_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GET_COMMENT_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GET_COMMENT_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GET_COMMENT_FAILURE,
        error: "Something went wrong!",
      });
    }
  },

  //POST comment
  postCommentSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "create-rating-post",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.POST_COMMENT_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.POST_COMMENT_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.POST_COMMENT_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.POST_COMMENT_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
};
