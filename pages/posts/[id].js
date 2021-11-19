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
  const posts = await apiCaller("products", "GET", null).then((res) => {
    if (res.success) {
      return res.data;
    }
    return [];
  });

  const pathsEn = posts.map((post) => ({
    params: { id: `${post.id}` },
    locale: "en",
  }));
  const pathsJp = posts.map((post) => ({
    params: { id: `${post.id}` },
    locale: "jp",
  }));
  const pathsVi = posts.map((post) => ({
    params: { id: `${post.id}` },
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
