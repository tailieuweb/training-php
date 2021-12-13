//CHANGE PASSWORD
export const CHANGE_PASSWORD_REQUEST = "CHANGE_PASSWORD_REQUEST";
export const CHANGE_PASSWORD_SUCCESS = "CHANGE_PASSWORD_SUCCESS";
export const CHANGE_PASSWORD_FAILURE = "CHANGE_PASSWORD_FAILURE";

export const changePasswordRequest = payload => {
  return {
    type: CHANGE_PASSWORD_REQUEST,
    payload: payload,
  };
};
//LOGIN
export const LOGIN_REQUEST = "LOGIN_REQUEST";
export const LOGIN_SUCCESS = "LOGIN_SUCCESS";
export const LOGIN_FAILURE = "LOGIN_FAILURE";

export const loginRequest = payload => {
  return {
    type: LOGIN_REQUEST,
    payload: payload,
  };
};
//LOGOUT
export const LOGOUT_REQUEST = "LOGOUT_REQUEST";
export const LOGOUT_SUCCESS = "LOGOUT_SUCCESS";
export const LOGOUT_FAILURE = "LOGOUT_FAILURE";

export const logoutRequest = payload => {
  return {
    type: LOGOUT_REQUEST,
    payload: payload,
  };
};

//REGISTER
export const REGISTER_REQUEST = "REGISTER_REQUEST";
export const REGISTER_SUCCESS = "REGISTER_SUCCESS";
export const REGISTER_FAILURE = "REGISTER_FAILURE";

export const registerRequest = payload => {
  return {
    type: REGISTER_REQUEST,
    payload: payload,
  };
};
//RESETPASS
export const RESETPASS_REQUEST = "RESETPASS_REQUEST";
export const RESETPASS_SUCCESS = "RESETPASS_SUCCESS";
export const RESETPASS_FAILURE = "RESETPASS_FAILURE";

export const resetpassRequest = payload => {
  return {
    type: RESETPASS_REQUEST,
    payload: payload,
  };
};
//CONFIRMPASS
export const CONFIRMPASS_REQUEST = "CONFIRMPASS_REQUEST";
export const CONFIRMPASS_SUCCESS = "CONFIRMPASS_SUCCESS";
export const CONFIRMPASS_FAILURE = "CONFIRMPASS_FAILURE";

export const confirmpassRequest = payload => {
  return {
    type: CONFIRMPASS_REQUEST,
    payload: payload,
  };
};

