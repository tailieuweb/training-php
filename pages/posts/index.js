import Footer from "../../src/components/Footer";
import Header from "../../src/components/Header";
import Posts from "../../src/components/Posts";

export default function PostsPage() {
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
