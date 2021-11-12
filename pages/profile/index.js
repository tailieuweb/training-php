import Footer from "../../src/components/Footer";
import Header from "../../src/components/Header";
import Profile from "../../src/components/Profile";

export default function ProfilePage() {
  return (
    <>
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
