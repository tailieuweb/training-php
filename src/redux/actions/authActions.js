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

export const actSignInUser = (user) => {
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
          toast.success("Đăng nhập thành công!");
        }
      })
      .catch(() => toast.error("Email hoặc mật khẩu của bạn không chính xác!"));
  };
};

export const actSignUpUser = (user, callback) => {
  return () => {
    const { name,email, password, confirm_password } = user;
    const data = { name,email, password, confirm_password };
    return apiCaller(`api/register`, "POST", data)
      .then((res) => {
        if (res.success) {
          if(!res.data.success) {
            return toast.warning("Email này đã có người sử dụng!");
          }
          toast.success("Đăng ký thành công!");
          callback();
        }
      })
      .catch(() => toast.error("Có lỗi xảy ra!"));
  };
};
