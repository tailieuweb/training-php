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
