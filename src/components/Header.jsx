import AuthModal from "./Auth/AuthModal";
import { useState } from "react";

export default function Header() {
  const [isLogin, setLogin] = useState();

  const onLogout = () => {};

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-light">
      <div className="container">
        <a className="navbar-brand" href="#">
          React Confessions
        </a>
        <button
          className="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span className="navbar-toggler-icon" />
        </button>
        <div className="collapse navbar-collapse" id="navbarSupportedContent">
          <ul className="navbar-nav ml-auto">
            <div>
              {isLogin === false ? (
                <button
                  className="btn btn-primary btn-sm"
                  type="button"
                  data-toggle="modal"
                  data-target="#authModal"
                >
                  <i className="fa fa-sign-in" /> Sign In
                </button>
              ) : (
                <button
                  className="btn btn-danger btn-sm"
                  type="button"
                  onClick={onLogout}
                >
                  <i className="fa fa-sign-out" /> Sign Out
                </button>
              )}
            </div>
            <AuthModal isLogin={isLogin} setLogin={setLogin} />
          </ul>
        </div>
      </div>
    </nav>
  );
}
