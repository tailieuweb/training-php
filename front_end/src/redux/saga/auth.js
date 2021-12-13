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

  //LOGIN
  loginSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-login",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.LOGIN_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.LOGIN_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.LOGIN_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.LOGIN_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //LOGOUT
  logoutSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-logout",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.LOGOUT_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.LOGOUT_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.LOGOUT_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.LOGOUT_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //REGISTER
  registerSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-register",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.REGISTER_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.REGISTER_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.REGISTER_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.REGISTER_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
   //RESETPASS
   resetpassSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-code-reset-password",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.RESETPASS_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.RESETPASS_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.RESETPASS_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.RESETPASS_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
  //CONFIRMPASS
  confirmpassSaga: function* (action) {
    let payload = action.payload;
    try {
      let response = yield global.apiService.apiCall(
        "post",
        "member-reset-password",
        payload,
        true
      );

      if (response.data) {
        let responseData = response.data;
        if (responseData.isSuccess) {
          yield put({
            type: actionType.CONFIRMPASS_SUCCESS,
            payload: responseData.data,
          });
        } else {
          yield put({
            type: actionType.CONFIRMPASS_FAILURE,
            error: responseData.error,
          });
        }
      } else {
        yield put({
          type: actionType.CONFIRMPASS_FAILURE,
          error: "Something went wrong!",
        });
      }
    } catch (error) {
      yield put({
        type: actionType.CONFIRMPASS_FAILURE,
        error: "Something went wrong!",
      });
    }
  },
};
