import authReducer from "./authReducer";
import counterReducer from "./counterReducer";
import { combineReducers } from "redux";

const rootReducer = combineReducers({
  auth: authReducer,
  counter: counterReducer,
});

export default rootReducer;
