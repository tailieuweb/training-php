import jwt from "jsonwebtoken";
import { toast } from "react-toastify";
import apiCaller from "../../utils/apiCaller";
import { startLoading, stopLoading } from "./commonActions";

const APP_JWT_TOKEN = process.env.NEXT_PUBLIC_APP_JWT_TOKEN;

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
      const storage = localStorage.getItem(".user");
      const { email, password } = jwt.verify(storage, APP_JWT_TOKEN);
      const data = { email, password };
      return apiCaller(`api/login`, "POST", data)
        .then((res) => {
          if (res.success) {
            dispatch(loginUser(res.data));
            const token = jwt.sign({ ...res.data, password }, APP_JWT_TOKEN);
            localStorage.setItem(".user", token);
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
    dispatch(startLoading());
    const { email, password } = user;
    const data = { email, password };
    return apiCaller(`api/login`, "POST", data)
      .then((res) => {
        if (res.success) {
          dispatch(loginUser(res.data));
          const token = jwt.sign({ ...res.data, password }, APP_JWT_TOKEN);
          localStorage.setItem(".user", token);
          toast.success("SignIn successfully!");
          callback();
        }
      })
      .catch(() => toast.warning("Your email or password is incorrect!"))
      .finally(() => dispatch(stopLoading()));
  };
};

export const actSignUpUser = (user, callback) => {
  return (dispatch) => {
    dispatch(startLoading());
    const { name, email, password, confirm_password } = user;
    const data = { name, email, password, confirm_password };
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
      .catch(() => toast.error("An error occurred!"))
      .finally(() => dispatch(stopLoading()));
  };
};

export const actLogoutUser = () => {
  return (dispatch) => {
    dispatch(logoutUser());
    toast.success("SignOut successfully!");
  };
};
