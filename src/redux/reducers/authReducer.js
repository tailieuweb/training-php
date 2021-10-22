import { LOGIN_AUTH, LOGOUT_AUTH } from "../actions/authActions";

const counterReducer = (state = { user: null }, action) => {
  switch (action.type) {
    case LOGIN_AUTH:
      return { ...state, user: action.user };
    case LOGOUT_AUTH:
      localStorage.removeItem(".user");
      return { ...state, user: null };
    default:
      return { ...state };
  }
};

export default counterReducer;
