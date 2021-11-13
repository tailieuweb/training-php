import { appWithTranslation } from "next-i18next";
import "react-loading-skeleton/dist/skeleton.css";
import { toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import "../src/assets/styles/argon.min.css";
import "../src/assets/styles/globals.css";
import wrapper from "../src/redux/store";

toast.configure();
function MyApp({ Component, pageProps }) {
  return <Component {...pageProps} />;
}

export default wrapper.withRedux(appWithTranslation(MyApp));
