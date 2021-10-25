import { useEffect, useState } from "react";
import { useDispatch } from "react-redux";
import { actLoadSignInUser } from "../redux/actions/authActions";
import Footer from "./Footer";
import Header from "./Header";
import Posts from "./Posts";

export default function HomePage() {
  const dispatch = useDispatch();

  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    (async () => {
      await dispatch(actLoadSignInUser());
      setIsLoading(false);
    })();
  }, []);

  return (
    <>
      <Header isLoading={isLoading}/>
      <div className="container">
        <Posts />
      </div>
      <Footer />
    </>
  );
}
