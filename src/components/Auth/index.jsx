import { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { toast } from "react-toastify";
import { actSignInUser, actSignUpUser } from "../../redux/actions/authActions";
import AuthSignIn from "./AuthSignIn";
import AuthSignUp from "./AuthSignUp";

const defaultInput = {
  name: "",
  email: "",
  password: "",
  confirm_password: "",
};

export default function Auth() {
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
      return toast.warning("Please enter the full information.");
    }

    dispatch(
      actSignInUser({ email, password }, () => {
        document
          .querySelector("#authModal button[data-dismiss='modal']")
          .click();
      })
    );
  };

  //Hàm call api register
  const signUp = () => {
    const { name, email, password, confirm_password } = inputForm;
    if (
      email.length === 0 ||
      password.length === 0 ||
      name.length === 0 ||
      confirm_password.length === 0
    ) {
      return toast.warning("Please enter the full information.");
    }
    if (password !== confirm_password) {
      return toast.warning("Re password is incorrect!");
    }
    dispatch(
      actSignUpUser({ name, email, password, confirm_password }, () => {
        setAuthStatus("signIn");
      })
    );
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
