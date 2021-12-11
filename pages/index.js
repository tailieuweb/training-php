import { serverSideTranslations } from "next-i18next/serverSideTranslations";
import Head from "next/head";
import Footer from "../src/components/Footer";
import Header from "../src/components/Header";
import Posts from "../src/components/Posts";

export default function HomePage() {
  return (
    <>
      <Head>
        <title>React Confessions</title>
      </Head>
      <Header />
      <div className="bg-white">
        <div className="container pb-3">
          <button type="button" class="btn btn-primary btn-sm">
            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Mới Nhất
          </button>
          <button type="button" class="btn btn-warning btn-sm">
            <i class="fa fa-random" aria-hidden="true"></i> Ngẫu Nhiên
          </button>
          <button type="button" class="btn btn-danger btn-sm">
            <i class="fa fa-random" aria-hidden="true"></i> Bài Viết Ngẫu Nhiên
          </button>
        </div>
      </div>
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
