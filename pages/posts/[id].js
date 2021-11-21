import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Head from "next/head";
import { useTranslation } from "react-i18next";
import Footer from "../../src/components/Footer";
import Header from "../../src/components/Header";
import PostsDetail from "../../src/components/PostsDetail";
import apiCaller from "../../src/utils/apiCaller";

export default function PostsDetailPage() {
  const { t } = useTranslation("common");

  return (
    <>
      <Head>
        <title>{t("app.common.postsDetail")}</title>
      </Head>
      <Header />
      <div className="container">
        <PostsDetail />
      </div>
      <Footer />
    </>
  );
}

// This function gets called at build time
export const getStaticPaths = async () => {
  const pathsEn = Array.from({ length: 1000 }, (_, index) => ({
    params: { id: `${index}` },
    locale: "en",
  }));
  const pathsJp = Array.from({ length: 1000 }, (_, index) => ({
    params: { id: `${index}` },
    locale: "jp",
  }));
  const pathsVi = Array.from({ length: 1000 }, (_, index) => ({
    params: { id: `${index}` },
    locale: "vi",
  }));

  return {
    paths: [...pathsEn, ...pathsJp, ...pathsVi],
    fallback: true,
  };
};

export async function getStaticProps({ locale }) {
  return {
    props: {
      ...(await serverSideTranslations(locale, ["common"])),
      // Will be passed to the page component as props
    },
  };
}
