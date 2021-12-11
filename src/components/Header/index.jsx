import Link from "next/link";
import { useRouter } from "next/router";
import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
import { useDispatch, useSelector } from "react-redux";
import {
  actLoadSignInUser,
  actLogoutUser,
} from "../../redux/actions/authActions";
import Auth from "../Auth";
import HeaderAuth from "./HeaderAuth";
import HeaderLanguages from "./HeaderLanguages";
import HeaderSearch from "./HeaderSearch";

export default function Header() {
  const {t} = useTranslation("common");

  // Next
  const router = useRouter();
  const { q = "" } = router.query;

  // Redux
  const dispatch = useDispatch();
  const authSelector = useSelector((state) => state.auth);
  const user = authSelector?.user;

  // State
  const [isLoading, setIsLoading] = useState(true);
  const [inputSearch, setInputSearch] = useState(q);

  useEffect(() => {
    (async () => {
      await dispatch(actLoadSignInUser());
      setIsLoading(false);
    })();
  }, []);

  const onLogout = () => {
    dispatch(actLogoutUser(t));
  };

  const onSearch = (e) => {
    e.preventDefault();
    router.push(`/search?q=${inputSearch}`);
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-light bg-secondary shadow">
      <div className="container">
        <Link href="/">
          <a className="navbar-brand">React Confessions</a>
        </Link>
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
          <ul className="w-100 navbar-nav ml-auto align-items-center d-flex justify-content-end flex-row mt-3 mt-lg-0">
            <HeaderSearch
              onSearch={onSearch}
              inputSearch={inputSearch}
              setInputSearch={setInputSearch}
            />
            <HeaderLanguages />
            <HeaderAuth isLoading={isLoading} user={user} onLogout={onLogout} />
          </ul>
          <Auth />
        </div>
      </div>
    </nav>
  );
}
