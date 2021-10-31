import { useDispatch, useSelector } from "react-redux";
import { actLogoutUser } from "../../redux/actions/authActions";
import Auth from "../Auth";
import HeaderAuth from "./HeaderAuth";
import HeaderLanguages from "./HeaderLanguages";
import HeaderSearch from "./HeaderSearch";

export default function Header(props) {
  const { isLoading } = props;
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;

  // Redux
  const dispatch = useDispatch();

  const onLogout = () => {
    dispatch(actLogoutUser());
  };

  const onSearch = () => {
    console.log("Search");
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
          <ul className="w-75 navbar-nav ml-auto align-items-center d-flex justify-content-end flex-row mt-3 mt-lg-0">
            <HeaderSearch onSearch={onSearch} />
            <HeaderLanguages />
            <HeaderAuth isLoading={isLoading} user={user} onLogout={onLogout} />
          </ul>
          <Auth />
        </div>
      </div>
    </nav>
  );
}
