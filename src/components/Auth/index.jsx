import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { toast } from "react-toastify";
import { actSignInUser } from "../../redux/actions/authActions";
import apiCaller from "../../utils/apiCaller";
import AuthSignIn from "./AuthSignIn";
import AuthSignUp from "./AuthSignUp";

const defaultInput = { email: "", password: "", repassword: "" };

export default function Auth(props) {
  const [authType, setAuthStatus] = useState("signIn");
  const [inputForm, setInputForm] = useState(defaultInput);

  // Redux
  const dispatch = useDispatch();

  // Functions
  const onChange = (e) => {
    const { name, value } = e.target;
    setInputForm({ ...inputForm, [name]: value });
  };

  //Hàm call api login
  const signIn = () => {
    const { email, password } = inputForm;
    if (email.length === 0 || password.length === 0) {
      return toast.warning("Vui lòng nhập đầy đủ thông tin");
    }

    dispatch(actSignInUser({ email, password }));
    document.querySelector("#authModal button[data-dismiss='modal']").click();
  };

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
  const onSubmit = (e) => {
    e.preventDefault();
    if (authType === "signIn") {
      return signIn();
    }
    signUp();
  };

  return (
    <div
      className="modal fade"
      id="authModal"
      tabIndex="-1"
      role="dialog"
      aria-labelledby="authModalLabel"
      aria-hidden="true"
    >
      <form
        onSubmit={onSubmit}
        className="modal-dialog modal-dialog-centered"
        role="document"
      >
        <div className="modal-content">
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
              <AuthSignIn inputForm={inputForm} onChange={onChange} />
            ) : (
              <AuthSignUp inputForm={inputForm} onChange={onChange} />
            )}
          </div>
          <div className="modal-footer d-flex justify-content-between">
            <button
              type="button"
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
              <button type="submit" className="btn btn-primary">
                {authType === "signIn" ? "Sign In" : "Sign Up"}
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  );
}
