import Auth from "./index";

export default function AuthModal(props) {
  const { setLogin } = props;
  return (
    <div
      className="modal fade"
      id="authModal"
      tabIndex="-1"
      role="dialog"
      aria-labelledby="authModalLabel"
      aria-hidden="true"
    >
      <div className="modal-dialog modal-dialog-centered" role="document">
        <div className="modal-content">
          <Auth setLogin={setLogin} />
        </div>
      </div>
    </div>
  );
}
