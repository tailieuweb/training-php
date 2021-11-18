import React from "react";

import "../css/Footer.css";
/*Footer */
const Footer = () => {
  return (
    <nav className="footer">
      <div className="container">
        <div className="row">
          <div className="col-4">
            <h1>About Us</h1>
            <a href="#">Team J</a>
          </div>
          <div className="col-4">
            <h1>Contact Us</h1>
          </div>
          <div className="col-4">
            <h1>Social Media</h1>
            <a href="https://www.facebook.com">
              <i className="fab fa-facebook-f"> Facebook</i>
            </a>
            <a href="https://www.instagram.com">
              <i className="fab fa-instagram"> Instagram</i>
            </a>
            <a href="https://twitter.com">
              <i className="fab fa-twitter"> Twitter</i>
            </a>
            <a href="https://www.youtube.com">
              <i className="fab fa-youtube"> Youtube</i>
            </a>
          </div>
        </div>
      </div>
    </nav>
  );
};
export default Footer;
