import Link from 'next/link';

export default function HeaderAuth(props) {
  const { isLoading, user, onLogout } = props;

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
          >
            <i className="fa fa-user mr-1" aria-hidden="true"></i> {user.name}
          </a>
          <ul
            className="dropdown-menu"
            aria-labelledby="navbarDropdownMenuLink2"
          >
            <li>
              <Link href="/profile">
                <a className="dropdown-item d-flex align-items-center">
                  <i className="fa fa-user" aria-hidden="true"></i>
                  My Profile
                </a>
              </Link>
            </li>
            <li>
              <a
                className="dropdown-item d-flex align-items-center"
                onClick={onLogout}
                style={{ cursor: "pointer" }}
              >
                <i className="fa fa-sign-out" aria-hidden="true"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      )}
      {!user && (
        <button
          className="btn btn-primary btn-sm"
          type="button"
          data-toggle="modal"
          data-target="#authModal"
        >
          <i className="fa fa-sign-in" /> Sign In
        </button>
      )}
    </div>
  );
}
