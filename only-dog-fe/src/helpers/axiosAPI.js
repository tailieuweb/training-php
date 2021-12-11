import axios from "axios";

axios.defaults.baseURL = "https://only-dog-be.azurewebsites.net";

axios
  .get("/users/get_all")
  .then((response) => console.log("~ response", response.data));
