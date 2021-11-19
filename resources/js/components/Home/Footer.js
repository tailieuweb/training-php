import React from "react";
import { Col, Row } from "reactstrap";
import "../../../css/Footer.css";


export default function Footer() {
  return (
    <div className="footer mt-5">
      <div className="footer-content container-fluid">
        <Row>
          <Col xs="12" sm="12" md="4">
            <div className="footer-logo mb-3">
              <img
                src="https://cdn.shopify.com/s/files/1/0076/1708/5530/files/logo_white_360x.png?v=1612539402"
                alt="uneox logo"
                className="img-fluid navbar--custom-logo"
              />
            </div>
          </Col>
          <Col xs="12" sm="12" md="4">
            <div className="footer-introduce mb-3">
              <h4>Introduce</h4>
              <p>Introduce content</p>
            </div>
          </Col>
          <Col xs="12" sm="12" md="4">
            <div className="footer-contact mb-3">
              <h4>Contact</h4>
              <p>
                  <ul className="footer-contact-detail">
                      <li>Email: pn092xxxx@gmail.com</li>
                      <li>Phone: 092xxxxxxx</li>
                      <li>Address: THU DUC COLLEGE OF TECHNOLOGY</li>
                  </ul>
              </p>
            </div>
          </Col>
        </Row>
      </div>
    </div>
  );
}
