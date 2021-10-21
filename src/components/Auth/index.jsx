import { Fragment, useState } from "react";
import { toast } from "react-toastify";
import AuthSignIn from "./AuthSignIn";
import AuthSignUp from "./AuthSignUp";
import apiCaller from "../../utils/apiCaller";

export default function Auth(props) {
  const [authType, setAuthStatus] = useState("signIn");
  const {
    name,
    email,
    password,
    confirm_password,
    setName,
    setEmail,
    setPassword,
    setConfirmPassword,
    setLogin,
  } = props;
  //Hàm call api login
  const signIn = () => {};

  //Hàm call api register
  const signUp = () => {
    if (password !== confirm_password) {
      return toast("Mật khẩu nhập lại không đúng!");
    }
    if (name === "") {
      return toast("Tên không được trống!");
    }
    if (email === "") {
      return toast("Email không được trống!");
    }
    apiCaller("api/register", "POST", {
      name,
      email,
      password,
      confirm_password,
    })
      .then((res) => {
        localStorage.setItem("token", res.data.token);
        toast("Đăng ký thành công!");
      })
      .catch((error) => {
        console.log("error", error);
        toast("Email đã tồn tại vui lòng nhập lại!");
      });
  };

  //Hàm click signIn và signUp
  const auth = () => {
    if (authType === "signIn") {
      signIn();
    } else {
      signUp();
    }
  };

  return (
    <Fragment>
      <div className="modal-header">
        <h5 className="modal-title" id="authModalLabel">
          {authType === "signIn" ? "Sign In" : "Sign Up"}
        </h5>
        <button
          type="button"
          className="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div className="modal-body px-5 py-3">
        {authType === "signIn" ? (
          <AuthSignIn />
        ) : (
          <AuthSignUp
            name={name}
            setName={setName}
            email={email}
            setEmail={setEmail}
            password={password}
            setPassword={setPassword}
            confirm_password={confirm_password}
            setConfirmPassword={setConfirmPassword}
          />
        )}
      </div>
      <div className="modal-footer d-flex justify-content-between">
        <button
          className="btn btn-dark btn-sm"
          onClick={() =>
            setAuthStatus(authType === "signIn" ? "signUp" : "signIn")
          }
        >
          {authType === "signIn"
            ? "Do not have an account?"
            : "Already have an account?"}{" "}
        </button>
        <div>
          <button
            type="button"
            className="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
          <button type="button" className="btn btn-primary" onClick={auth}>
            {authType === "signIn" ? "Sign In" : "Sign Up"}
          </button>
        </div>
      </div>
    </Fragment>
  );
}
