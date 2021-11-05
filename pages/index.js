import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import DefaultHomePage from "../src/components/HomePage";

function HomePage() {
  return <DefaultHomePage />;
}

export async function getStaticProps({ locale }) {
  return {
    props: {
      ...(await serverSideTranslations(locale, ["common"])),
      // Will be passed to the page component as props
    },
  };
}

export default HomePage;
