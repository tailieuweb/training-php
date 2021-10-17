import { Fragment, useState } from "react";
import { toast } from "react-toastify";
import AuthSignIn from "./AuthSignIn";
import AuthSignUp from "./AuthSignUp";
import apiCaller from "../../utils/apiCaller";

export default function Auth(props) {
  const [authType, setAuthStatus] = useState("signIn");

  //Hàm call api login
  const signIn = () => {};

  //Hàm call api register
  const signUp = () => {};

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
        {authType === "signIn" ? <AuthSignIn /> : <AuthSignUp />}
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
