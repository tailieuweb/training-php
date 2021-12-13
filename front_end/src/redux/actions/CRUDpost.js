//CREATE POST
export const CREATE_POST_REQUEST = "CREATE_POST_REQUEST";
export const CREATE_POST_SUCCESS = "CREATE_POST_SUCCESS";
export const CREATE_POST_FAILURE = "CREATE_POST_FAILURE";

export function createPostRequest(payload) {
  return {
    type: CREATE_POST_REQUEST,
    payload: payload,
  };
}
//UPDATE POST
export const UPDATE_POST_REQUEST = "UPDATE_POST_REQUEST";
export const UPDATE_POST_SUCCESS = "UPDATE_POST_SUCCESS";
export const UPDATE_POST_FAILURE = "UPDATE_POST_FAILURE";

export function updatePostRequest(payload) {
  return {
    type: UPDATE_POST_REQUEST,
    payload: payload,
  };
}
// GET LIST POST BY USER
export const GET_LIST_POST_BY_USER_REQUEST = "GET_LIST_POST_BY_USER_REQUEST";
export const GET_LIST_POST_BY_USER_SUCCESS = "GET_LIST_POST_BY_USER_SUCCESS";
export const GET_LIST_POST_BY_USER_FAILURE = "GET_LIST_POST_BY_USER_FAILURE";

export function getListPostByUserRequest(payload) {
  return {
    type: GET_LIST_POST_BY_USER_REQUEST,
    payload: payload,
  };
}
//DELETE POST
export const DELETE_POST_REQUEST = "DELETE_POST_REQUEST";
export const DELETE_POST_SUCCESS = "DELETE_POST_SUCCESS";
export const DELETE_POST_FAILURE = "DELETE_POST_FAILURE";

export function deletePostRequest(payload) {
  return {
    type: DELETE_POST_REQUEST,
    payload: payload,
  };
}

//POST FILTER
export const POST_FILTER_REQUEST = "POST_FILTER_REQUEST";
export const POST_FILTER_SUCCESS = "POST_FILTER_SUCCESS";
export const POST_FILTER_FAILURE = "POST_FILTER_FAILURE";

export function postFilterRequest(payload) {
  return {
    type: POST_FILTER_REQUEST,
    payload: payload,
  };
}
