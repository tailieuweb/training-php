import "./App.css";
import RouteContainer from "./features/index";
import LoadingOverlay from "react-loading-overlay";
import { BrowserRouter as Router } from "react-router-dom";
import { useEffect, useState } from "react";
import Header from "./components/Header";
import Footer from "./components/Footer";

function App() {
  return (
    <LoadingOverlay active={false} spinner>
      <Router>
        {/* <Header /> */}
        <div className="App">{RouteContainer}</div>
        <Footer />
      </Router>
    </LoadingOverlay>
  );
}
export default App;
