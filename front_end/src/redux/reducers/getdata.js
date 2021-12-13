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

export const getAllCategorieReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //GET ALL CATEGORIE
    case actionTypes.GET_ALL_CATEGORIE_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_ALL_CATEGORIE_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GET_ALL_CATEGORIE_FAILURE:
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

//get related post
export const getRelatedPostReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //GET ALL CATEGORIE
    case actionTypes.GET_RELATED_POST_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_RELATED_POST_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GET_RELATED_POST_FAILURE:
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
//get featureMember
export const getFeatureMemberReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //GET  featureMember
    case actionTypes.GET_FEATURE_MEMBER_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_FEATURE_MEMBER_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GET_FEATURE_MEMBER_FAILURE:
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

//get comment
export const getCommentReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //GET  comment
    case actionTypes.GET_COMMENT_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.GET_COMMENT_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.GET_COMMENT_FAILURE:
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

//posst comment
export const postCommentReducer = (state = initialState, action) => {
  let newState = {};
  switch (action.type) {
    //post  comment
    case actionTypes.POST_COMMENT_REQUEST:
      newState = _.cloneDeep(state);
      newState.isLoading = true;

      return newState;

    case actionTypes.POST_COMMENT_SUCCESS:
      newState = _.cloneDeep(state);
      newState.isLoading = false;
      newState.isSuccess = true;

      newState.data = action.payload;

      return newState;

    case actionTypes.POST_COMMENT_FAILURE:
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
