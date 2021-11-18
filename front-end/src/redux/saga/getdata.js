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
};
