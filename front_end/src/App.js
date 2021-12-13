import "./App.css";
import RouteContainer from "./features/index";
import LoadingOverlay from "react-loading-overlay";
import { BrowserRouter as Router } from "react-router-dom";
import { useEffect, useState } from "react";
import Header from "./components/Header";
import Footer from "./components/Footer";
import PropTypes from "prop-types";
import { bindActionCreators } from "redux";
import { connect } from "react-redux";

function App(props) {
  const { isLoading } = props;

  return (
    <LoadingOverlay active={isLoading} spinner>
      <Router>
        {/* <Header /> */}
        <div className="App">{RouteContainer}</div>
        <Footer />
      </Router>
    </LoadingOverlay>
  );
}
App.propTypes = {
  isLoading: PropTypes.bool,
};
function mapStateToProps(state) {
  return {
    isLoading: state.CRUDPostReducer.isLoading,
  };
}

function mapDispatchToProps(dispatch) {
  return {
    actions: bindActionCreators({}, dispatch),
  };
}

export default connect(mapStateToProps, mapDispatchToProps)(App);
