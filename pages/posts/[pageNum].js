import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import DefaultHomePage from "../../src/components/HomePage";

function HomePage() {
  return <DefaultHomePage />;
}

// This function gets called at build time
export const getStaticPaths = () => {
  return {
    paths: [
      { params: { pageNum: "1" }, locale: "en" },
      { params: { pageNum: "2" }, locale: "en" },
      { params: { pageNum: "3" }, locale: "en" },
      { params: { pageNum: "1" }, locale: "vi" },
      { params: { pageNum: "2" }, locale: "vi" },
      { params: { pageNum: "3" }, locale: "vi" },
    ],
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

export default HomePage;
