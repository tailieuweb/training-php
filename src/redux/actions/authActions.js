//Action Types
export const LOGIN_AUTH = "LOGIN_AUTH";
export const LOGOUT_AUTH = "LOGOUT_AUTH";

//Action Creator
export const loginCounter = (user) => ({
  type: LOGIN_AUTH,
  user,
});

export const logoutCounter = () => ({
  type: LOGOUT_AUTH,
});
