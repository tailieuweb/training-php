import { put } from "redux-saga/effects";
import * as actionType from "../actions/index";
console.log(actionType);

// eslint-disable-next-line
export default {
  //CHANGE PASSWORD
  changePasswordSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-password",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.CHANGE_PASSWORD_SUCCESS,
            payload: responseData.message,
          });
        } else {
          yield put({
            type: actionType.CHANGE_PASSWORD_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.CHANGE_PASSWORD_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.CHANGE_PASSWORD_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
};
