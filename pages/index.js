import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Footer from "../src/components/Footer";
import Header from "../src/components/Header";
import Posts from "../src/components/Posts";

export default function HomePage() {
  return (
    <>
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