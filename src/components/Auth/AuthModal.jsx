import Auth from "./index";
import { useState } from "react";

export default function AuthModal(props) {
  const { setLogin } = props;
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [confirm_password, setConfirmPassword] = useState("");
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
          <Auth
            name={name}
            setName={setName}
            email={email}
            setEmail={setEmail}
            password={password}
            setPassword={setPassword}
            confirm_password={confirm_password}
            setConfirmPassword={setConfirmPassword}
            setLogin={setLogin}
          />
        </div>
      </div>
    </div>
  );
}
