// FEATURE VIEW PROFILE
//GET PROFILE
export const GET_PROFILE_REQUEST = "GET_PROFILE_REQUEST";
export const GET_PROFILE_SUCCESS = "GET_PROFILE_SUCCESS";
export const GET_PROFILE_FAILURE = "GET_PROFILE_FAILURE";

export const getProfileRequest = payload => {
  return {
    type: GET_PROFILE_REQUEST,
    payload: payload,
  };
};
// FEATURE UPDATE PROFILE
//UPDATE PROFILE
export const UPDATE_PROFILE_REQUEST = "UPDATE_PROFILE_REQUEST";
export const UPDATE_PROFILE_SUCCESS = "UPDATE_PROFILE_SUCCESS";
export const UPDATE_PROFILE_FAILURE = "UPDATE_PROFILE_FAILURE";

export const updateProfileRequest = payload => {
  return {
    type: UPDATE_PROFILE_REQUEST,
    payload: payload,
  };
};
