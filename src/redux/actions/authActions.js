import { toast } from "react-toastify";
import apiCaller from "../../utils/apiCaller";

//Action Types
export const LOGIN_AUTH = "LOGIN_AUTH";
export const LOGOUT_AUTH = "LOGOUT_AUTH";

//Action Creator
export const loginUser = (user) => ({
  type: LOGIN_AUTH,
  user,
});

export const logoutUser = () => ({
  type: LOGOUT_AUTH,
});

export const actLoadSignInUser = () => {
  return (dispatch) => {
    try {
      const { email, password } = JSON.parse(localStorage.getItem(".user"));
      const data = { email, password };
      return apiCaller(`api/login`, "POST", data)
        .then((res) => {
          if (res.success) {
            dispatch(loginUser(res.data));
            localStorage.setItem(
              ".user",
              JSON.stringify({ ...res.data, password })
            );
          }
        })
        .catch(() => localStorage.removeItem(".user"));
    } catch (error) {
      localStorage.removeItem(".user");
    }
  };
};

export const actSignInUser = (user, callback) => {
  return (dispatch) => {
    const { email, password } = user;
    const data = { email, password };
    return apiCaller(`api/login`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(loginUser(res.data));
          localStorage.setItem(
            ".user",
            JSON.stringify({ ...res.data, password })
          );
          toast.success("SignIn successfully!");
          callback();
        }
      })
      .catch(() => toast.warning("Your email or password is incorrect!"));
  };
};

export const actSignUpUser = (user, callback) => {
  return () => {
    const { name,email, password, confirm_password } = user;
    const data = { name,email, password, confirm_password };
    return apiCaller(`api/register`, "POST", data)
      .then((res) => {
        if (res.success) {
          if (!res.data.success) {
            return toast.warning("This email is already exists!");
          }
          toast.success("SignUp successfully!");
          callback();
        }
      })
      .catch(() => toast.error("An error occurred!"));
  };
};

export const actLogoutUser = () => {
  return (dispatch) => {
    dispatch(logoutUser());
    toast.success("SignOut successfully!");
  };
};