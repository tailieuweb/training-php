import { useEffect } from "react";
import apiCaller from "../utils/apiCaller";
import Footer from "./Footer";
import Header from "./Header";
import Posts from "./Posts";

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
