import axios from "axios";
import env from "../env";

import { toast } from "react-toastify";
import qs from "query-string";
import Cookies from "universal-cookie";

export default class apiService {
  constructor() {
    let cookie = new Cookies();
    this._token = cookie.get("_token");
    //this._token = localStorage.getItem("token");
    this._admin_token = localStorage.getItem("admin-token");
    this._auth = null;
    this._user_id = 0;
    this._url = env.api_url;
  }

  setToken(token) {
    this._token = token;
  }

  getToken() {
    return this._token;
  }
  setAdminToken(admin_token) {
    this._admin_token = admin_token;
  }

  getAdminToken() {
    return this._admin_token;
  }

  getAuth() {
    return this._auth;
  }

  getUserFormLocal() {
    let user = localStorage.getItem("user");
    if (user) {
      return JSON.parse(user);
    } else {
      return false;
    }
  }

  setAuthParams(authParams) {
    this._auth = authParams;
    if (authParams.hasOwnProperty("api_token")) {
      this._token = authParams.api_token;
    }
    if (authParams.hasOwnProperty("user")) {
      this._user_id = authParams.user.id;
    }
  }

  parseParamsFromUrl(params) {
    return qs.parse(params);
  }

  encodeQueryData(data) {
    let ret = [];
    for (let d in data)
      ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(data[d]));
    return ret.join("&");
  }

  *apiCall(method, url, params, formData = false) {
    let resp = false;
    let logOut = false;
    let headers = {};
    let language = localStorage.getItem("current_language") ?? "vi";
    let text = "application/json";
    if (formData) {
      text = "multipart/form-data";
      let form_data = new FormData();
      for (let key in params) {
        form_data.append(key, params[key]);
      }
      params = form_data;
    }
    // console.log("param after", params);
    headers["Content-Type"] = text;
    headers["lang"] = language;
    if (this._token) {
      headers.Authorization = "Bearer " + this._token;
      //headers["token"] = this._token;
    }
    if (this._admin_token) {
      //headers.Authorization = "Bearer " + this._token;
      headers["admin-token"] = this._admin_token;
    }
    try {
      console.log(`${env.API_URL}/api/v1/${url}`);
      switch (method) {
        case "get":
          resp = yield axios.get(
            `${env.API_URL}/api/v1/${url}?` + this.encodeQueryData(params),
            { headers }
          );

          break;

        case "post":
          resp = yield axios.post(`${env.API_URL}/api/v1/${url}`, params, {
            headers,
          });
          break;
        case "put":
          resp = yield axios.put(`${env.API_URL}/api/v1/${url}`, params, {
            headers,
          });
          break;
        case "delete":
          resp = yield axios.delete(
            `${env.API_URL}/api/v1/${url}?` + this.encodeQueryData(params),
            {
              headers,
            }
          );
          break;
        default:
          break;
      }

      console.log("-------------");
      console.log("api:", method, url);
      console.log("header:", headers);
      console.log("params:", params);
      console.log("response: ", resp);
      console.log("-------------");
      console.log(resp.data);
      if (resp.data.hasOwnProperty("state") && resp.data.state === 401) {
        // yield put({
        //   type: Actions.LOGOUT_REQUEST
        // });
        // window.location.pathname("/login");
        toast.error(resp.data.errors);
      }
    } catch (e) {
      //
    }
    if (logOut) {
      return false;
    }
    return resp;
  }
}
