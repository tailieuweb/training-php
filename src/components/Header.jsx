import { useDispatch, useSelector } from "react-redux";
import { actLogoutUser } from "../redux/actions/authActions";
import Auth from "./Auth";

export default function Header(props) {
  const { isLoading } = props;
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;

  // Redux
  const dispatch = useDispatch();

  const onLogout = () => {
    dispatch(actLogoutUser());
  };

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
          <ul className="navbar-nav ml-auto align-items-center">
            <form className="d-flex mr-2">
              <input
                type="text"
                className="form-control form-control-sm mr-2"
                placeholder="Type a keyword...."
                required
              />
              <button
                className="d-flex align-items-center btn btn-primary btn-sm"
                type="submit"
              >
                <i className="fa fa-search mr-2" aria-hidden="true" /> Search
              </button>
            </form>
            {!isLoading && (
              <div>
                {!user ? (
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
            )}
          </ul>
          <Auth />
        </div>
      </div>
    </nav>
  );
}
