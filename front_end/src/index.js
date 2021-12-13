import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import createSagaMiddleware from "redux-saga";
import apiService from "./services/apiService";
import { createStore, applyMiddleware } from "redux";
import rootSaga from "./redux/saga";
import { composeWithDevTools } from "redux-devtools-extension";
import { logger } from "redux-logger";
import reducer from "./redux/reducers/index";
import { Provider } from "react-redux";

const sagaMiddleware = createSagaMiddleware();

global.apiService = new apiService();

const store = createStore(
  reducer,

  composeWithDevTools(applyMiddleware(sagaMiddleware, logger))
);
sagaMiddleware.run(rootSaga);

ReactDOM.render(
  <React.Fragment>
    <Provider store={store}>
      <App />
    </Provider>
  </React.Fragment>,
  document.getElementById("root")
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
