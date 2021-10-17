import axios from "axios";

export default function apiCaller(endpoint, method = "GET", data = null) {
  return axios({
    method,
    url: `http://127.0.0.1:8000/${endpoint}`,
    data,
  }).then((res) => res.data);
}
