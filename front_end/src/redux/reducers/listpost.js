import * as actionTypes from "../actions";
import _ from "lodash";
import routes from "../../constant/routes";
import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

const initialState = {
  isLoading: false,
  isSuccess: false,
  error: null,
  data: null,
};

export const featurepostReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //FEATUREPOST
    case actionTypes.FEATUREPOST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.FEATUREPOST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.FEATUREPOST_FAILURE:
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
/* getPostByCategory
 * Call Call api tất cả bài viết theo category
 * Lấy tất cả bà viết
 */
export const getPostByCategoryReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    case actionTypes.GETPOSTBYCATEGORY_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GETPOSTBYCATEGORY_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GETPOSTBYCATEGORY_FAILURE:
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
//GET  CATEGORIES
/* GET aLL  CATEGORIES
 * Call Call api tất cả category
 */
export const getCategoriesReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    case actionTypes.GETCATEGORIES_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GETCATEGORIES_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GETCATEGORIES_FAILURE:
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

/*
 * getFeaturePost

 * Call api lấy bài viết nổibat
 */
export const getFeaturePostReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    case actionTypes.GETFEATUREPOST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GETFEATUREPOST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GETFEATUREPOST_FAILURE:
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
/* GET detailPost
 *   Call api lấy chi tiết bài viết
 */
export const getDetailPostReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    case actionTypes.GETDETAILPOST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GETDETAILPOST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GETDETAILPOST_FAILURE:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = false;
      newState.error = action.error;
      toast(action.error);
      setTimeout(() => {
        window.location.href = routes.homepage;
      }, 3000);
      return newState;
    default:
      return state;
  }
};
