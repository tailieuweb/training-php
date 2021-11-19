import { useTranslation } from "next-i18next";
import Link from "next/link";
import { useRouter } from "next/router";

const getFlagByLocale = (locale) => {
  switch (locale) {
    case "en":
      return "/united.png";
    case "vi":
      return "/vietnam.png";
  }
};

export default function HeaderLanguages() {
  const router = useRouter();
  const { t } = useTranslation("common");

  return (
    <div className="dropdown ml-2">
      <a
        href="#"
        className="btn btn-dark btn-sm dropdown-toggle d-flex align-items-center"
        data-toggle="dropdown"
        id="navbarDropdownMenuLink2"
      >
        <img
          className="mr-2"
          style={{ width: "22px" }}
          src={getFlagByLocale(router.locale)}
        />
        {t("app.lang")}
      </a>
      <ul className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
        <li>
          <Link href="/" locale={"en"}>
            <a className="dropdown-item d-flex align-items-center">
              <img
                className="mr-2"
                style={{ width: "22px" }}
                src={getFlagByLocale("en")}
              />
              {t("app.lang.english")}
            </a>
          </Link>
        </li>
        <li>
          <Link href="/" locale={"vi"}>
            <a className="dropdown-item d-flex align-items-center">
              <img
                className="mr-2"
                style={{ width: "22px" }}
                src={getFlagByLocale("vi")}
              />
              {t("app.lang.vietnamese")}
            </a>
          </Link>
        </li>
      </ul>
    </div>
  );
}
