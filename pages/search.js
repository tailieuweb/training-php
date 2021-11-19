import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Head from 'next/head';
import { useRouter } from "next/router";
import { useTranslation } from "react-i18next";
import Footer from "../src/components/Footer";
import Header from "../src/components/Header";
import Posts from "../src/components/Posts";

export default function SearchPage() {
  const { t } = useTranslation("common");
  const router = useRouter();
  const { q = "" } = router.query;

  return (
    <>
      <Head>
        <title>
          {t("app.common.searchTitle")} {q}
        </title>
      </Head>
      <Header />
      <div className="container">
        <Posts />
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
