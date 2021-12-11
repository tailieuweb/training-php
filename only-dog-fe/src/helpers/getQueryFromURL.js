import { useLocation } from "react-router-dom";
//-----------------------------
export default function getQueryFromURL(name) {
  const query = new URLSearchParams(useLocation().search);
  return query.get(name);
}
