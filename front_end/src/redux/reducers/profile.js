import * as actionTypes from "../actions";
import _ from "lodash";
import routes from "../../constant/routes";
import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import Cookies from "universal-cookie";

const initialState = {
  isLoading: false,
  isSuccess: false,
  error: null,
  data: null,
};
toast.configure({
  autoClose: 3000,
  draggable: false,
  position: toast.POSITION.TOP_CENTER,
});

export const getProfileReducer = (state = initialState, action) => {
  let newState = {};
  let cookie = new Cookies();
  switch (action.type) {
    // FEATURE VIEW PROFILE
    //GET PROFILE
    case actionTypes.GET_PROFILE_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_PROFILE_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;
      localStorage.setItem("avatar", action.payload.avatar);
      return newState;

    case actionTypes.GET_PROFILE_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      toast(action.error);
      cookie.remove("_token");
      setTimeout(() => {
        window.location.href = routes.homepage;
      }, 2000);
      return newState;

    // FEATURE UPDATE PROFILE
    //UPDATE PROFILE
    case actionTypes.UPDATE_PROFILE_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.UPDATE_PROFILE_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;
      //console.log("data nè má ơi: ", action.payload);
      localStorage.setItem("avatar", action.payload.avatar);
      toast("Cập nhật thành công.!");
      setTimeout(() => {
        window.location.href = routes.profile;
      }, 2000);

      return newState;

    case actionTypes.UPDATE_PROFILE_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      toast(action.error);
      return newState;
    default:
      return state;
  }
};
