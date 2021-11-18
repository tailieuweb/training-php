import { put } from "redux-saga/effects";
import * as actionType from "../actions/index";
console.log(actionType);

// eslint-disable-next-line
export default {
  // FEATURE VIEW PROFILE
  getProfileSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "get",
        "member-profile",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.GET_PROFILE_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.GET_PROFILE_FAILURE,
            error: responseData.message,
          });
        }
      } else {
        yield put({
          type: actionType.GET_PROFILE_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.GET_PROFILE_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  // FEATURE UPDATE PROFILE
  //UPDATE PROFILE
  updateProfileSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-profile",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.data) {
          yield put({
            type: actionType.UPDATE_PROFILE_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.UPDATE_PROFILE_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.UPDATE_PROFILE_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.UPDATE_PROFILE_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
};
