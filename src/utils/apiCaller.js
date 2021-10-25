import axios from "axios";

const APP_SERVER_URL = process.env.NEXT_PUBLIC_APP_SERVER_URL;

export default function apiCaller(endpoint, method = "GET", data = null) {
  return axios({
    method,
    url: `${APP_SERVER_URL}/${endpoint}`,
    data,
  }).then((res) => res.data);
}
