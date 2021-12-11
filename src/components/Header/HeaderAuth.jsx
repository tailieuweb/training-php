import Link from "next/link";
import { useTranslation } from "react-i18next";

export default function HeaderAuth(props) {
  const { isLoading, user, onLogout } = props;
  const { t } = useTranslation("common");

  if (isLoading) {
    return null;
  }

  return (
    <div>
      {user && (
        <div className="dropdown ml-2">
          <a
            className="btn btn-primary btn-sm dropdown-toggle text-white"
            data-toggle="dropdown"
            id="navbarDropdownMenuLink2"
            style={{ padding: "5px 10px" }}
          >
            <i className="fa fa-user mr-1" aria-hidden="true"></i> {user.name} (
            {user.id})
          </a>
          <ul
            className="dropdown-menu"
            aria-labelledby="navbarDropdownMenuLink2"
          >
            <li>
              <Link href="/profile">
                <a className="dropdown-item d-flex align-items-center">
                  <i className="fa fa-user" aria-hidden="true"></i>
                  {t("app.common.profile")}
                </a>
              </Link>
            </li>
            <li>
              <a
                className="dropdown-item d-flex align-items-center"
                onClick={onLogout}
                style={{ cursor: "pointer" }}
              >
                <i
                  className="fa fa-sign-out"
                  aria-hidden="true"
                  style={{ marginRight: "0.75em" }}
                ></i>
                {t("app.auth.buttonSignOut")}
              </a>
            </li>
          </ul>
        </div>
      )}
      {!user && (
        <button
          className="btn btn-primary btn-sm ml-2"
          type="button"
          data-toggle="modal"
          data-target="#authModal"
          style={{ padding: "5px 10px" }}
        >
          <i className="fa fa-sign-in" /> {t("app.auth.buttonSignIn")}
        </button>
      )}
    </div>
  );
}
