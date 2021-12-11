import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Head from "next/head";
import Footer from "../src/components/Footer";
import Header from "../src/components/Header";
import Posts from "../src/components/Posts";
import PostsFilter from "../src/components/Posts/PostsFilter";

export default function HomePage() {
  return (
    <>
      <Head>
        <title>React Confessions</title>
      </Head>
      <Header />
      <PostsFilter />
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
