export default function HeaderAuth(props) {
  const { isLoading, user, onLogout } = props;

  if (isLoading) {
    return null;
  }

  return (
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
  );
}
