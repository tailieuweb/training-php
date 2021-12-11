import Loading from "./Base/Loading";
import { useSelector } from "react-redux";

export default function Footer() {
  const common = useSelector((state) => state.common);
  const loading = common?.loading;
  return (
    <div className="text-center my-5">
      {loading && <Loading />}
      Copyright &copy; {new Date().getFullYear()} - All rights reserved.
    </div>
  );
}
