import { useTranslation } from "react-i18next";

export default function AuthSignUp(props) {
  const { inputForm, onChange } = props;
  const { t } = useTranslation("common");

  return (
    <div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signUpInputUsername")}</label>
        <input
          name="name"
          type="text"
          value={inputForm.name}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signUpInputUsernamePlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signUpInputEmail")}</label>
        <input
          name="email"
          type="email"
          value={inputForm.email}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signUpInputEmailPlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signUpInputPassword")}</label>
        <input
          name="password"
          type="password"
          value={inputForm.password}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signUpInputPasswordPlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="">{t("app.auth.signUpInputRePassword")}</label>
        <input
          name="confirm_password"
          type="password"
          value={inputForm.confirm_password}
          onChange={onChange}
          className="form-control"
          placeholder={t("app.auth.signUpInputRePasswordPlaceholder")}
          aria-describedby="helpId"
          required
        />
      </div>
      <small id="helpId" className="text-muted">
        {t("app.auth.signUpDescription")}{" "}
        <a href="">{t("app.auth.signUpDescriptionTerm")}</a>{" "}
        {t("app.auth.signUpDescriptionAnd")}{" "}
        <a href="">{t("app.auth.signUpDescriptionPolicy")}</a>.
      </small>
    </div>
  );
}
