import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Head from "next/head";
import { useTranslation } from "react-i18next";
import Footer from "../../src/components/Footer";
import Header from "../../src/components/Header";
import Profile from "../../src/components/Profile";

export default function ProfilePage() {
  const { t } = useTranslation("common");

  return (
    <>
      <Head>
        <title>{t("app.common.profile")}</title>
      </Head>
      <Header />
      <div className="container">
        <Profile />
      </div>
      <Footer />
    </>
  );
}

export async function getStaticProps({ locale }) {
  return {
    props: {
      ...(await serverSideTranslations(locale, ["common"])),
      // Will be passed to the page component as props
    },
  };
}
