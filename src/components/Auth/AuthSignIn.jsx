import { useTranslation } from "react-i18next";
import githubLogo from "../../assets/images/github.svg";
import googleLogo from "../../assets/images/google.svg";

export default function AuthSignIn(props) {
  const {inputForm, onChange} = props;
  const { t } = useTranslation("common");

  return (
    <div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signInInputEmail")}</label>
        <input
          name="email"
          type="email"
          value={inputForm.email}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signInInputEmailPlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signInInputPassword")}</label>
        <input
          name="password"
          type="password"
          value={inputForm.password}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signInInputPasswordPlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="btn-wrapper text-center mb-2">
        {/* <a href="#" className="btn btn-neutral btn-icon">
          <span className="btn-inner--icon">
            <img src={githubLogo} />
          </span>
          <span className="btn-inner--text">Sign In Github</span>
        </a>
        <a href="#" className="btn btn-neutral btn-icon">
          <span className="btn-inner--icon">
            <img src={googleLogo} />
          </span>
          <span className="btn-inner--text">Sign In Google</span>
        </a> */}
      </div>
    </div>
  );
}
