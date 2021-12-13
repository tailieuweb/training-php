import { put } from "redux-saga/effects";
import * as actionType from "../actions/index";
console.log(actionType);

// eslint-disable-next-line
export default {
  //FEATUREPOST
  featurepostSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "featurest-posts",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.FEATUREPOST_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.FEATUREPOST_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.FEATUREPOST_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.FEATUREPOST_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET POST BY CATEGORY
  /* getPostByCategory
   * Call Call api tất cả bài viết theo category
   * Lấy tất cả bà viết
   */
  getPostByCategorySaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-post-by-category",
        payload
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GETPOSTBYCATEGORY_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GETPOSTBYCATEGORY_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GETPOSTBYCATEGORY_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GETPOSTBYCATEGORY_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET  CATEGORIES
  /* GET aLL  CATEGORIES
   * Call Call api tất cả category
   */
  getCategoriesSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-all-categories",
        payload
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GETCATEGORIES_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GETCATEGORIES_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GETCATEGORIES_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GETCATEGORIES_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET  FEATURE POST
  /*
 * getFeaturePost

 * Call api lấy bài viết nổibat
 */
  getFeaturePostSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "get-feature-post",
        payload
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GETFEATUREPOST_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GETFEATUREPOST_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GETFEATUREPOST_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GETFEATUREPOST_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //GET DETAIL POST
  /* GET detailPost
   *   Call api lấy chi tiết bài viết
   */
  getDetailPostSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "post-detail",
        payload
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess == true) {
          yield put({
            type: actionType.GETDETAILPOST_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GETDETAILPOST_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.GETDETAILPOST_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GETDETAILPOST_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
};
