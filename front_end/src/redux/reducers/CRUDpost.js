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
export default function CRUDPostReducer(state = initialState, action) {
  let newState = {};
  let cookie = new Cookies();
  switch (action.type) {
    //CREATE POST
    case actionTypes.CREATE_POST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.CREATE_POST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;
      toast("Tạo bài viết thành công. Vui lòng đợi admin duyệt.!");
      setTimeout(() => {
        window.location.href = routes.createpost;
      }, 2000);

      return newState;

    case actionTypes.CREATE_POST_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      console.log(action.error);
      toast(action.error);
      return newState;

    //UPDATE POST
    case actionTypes.UPDATE_POST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.UPDATE_POST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;
      toast("Cập nhật thành công.!");
      newState.data = action.payload;
      setTimeout(() => {
        window.location.href = routes.profile;
      }, 2000);

      return newState;

    case actionTypes.UPDATE_POST_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      console.log("ERROR: ", action.error);
      toast(action.error);
      return newState;

    //GET LIST POST BY USER
    case actionTypes.GET_LIST_POST_BY_USER_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_LIST_POST_BY_USER_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;
      newState.data = action.payload;
      return newState;

    case actionTypes.GET_LIST_POST_BY_USER_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      // console.log("ERROR: ", action.error);
      toast(action.error);
      return newState;

    //DELETE POST
    case actionTypes.DELETE_POST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.DELETE_POST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;
      toast("xóa bài viết thành công.!");

      // newState.data = action.payload;
      return newState;

    case actionTypes.DELETE_POST_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      toast(action.error);
      return newState;

    //POST FILTER
    case actionTypes.POST_FILTER_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.POST_FILTER_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;
      return newState;

    case actionTypes.POST_FILTER_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      console.log("ERROR: ", action.error);
      toast(action.error);
      return newState;
    default:
      return state;
  }
}
