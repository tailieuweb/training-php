import React from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import { Col, Nav, NavItem, Row, Button } from "reactstrap";
import "../../../css/Admin_Menu.css";
import UserManager from "./UserManager/UserManager";
import Categories from "./CategoriesManager/CategoriesManager";
import ProductManager from "./ProductManager/ProductManager";
import NoMatch from "../NoMatch/NoMatch";
export default function Admin_Menu({ setRoleChange }) {
    //Handle change state to go Admin page 1
    const handleAdminChange = (e) => {
        let txtNumUrl = window.location.href.indexOf("/", 10);   
        let currentUrl = window.location.href;
        let txtUrl = currentUrl.substring(0, txtNumUrl);
        window.location.href = txtUrl;
        setTimeout(() => {
            setRoleChange({ role: "user" });
        }, 400);    
    };

    return (
        <div className="admin-menu">
            <Router>
                <Row>
                    <Col lg="2">
                        <div className="nav--custom">
                            <img
                                src="https://cdn.shopify.com/s/files/1/0076/1708/5530/files/logo_360x.png?v=1609091045"
                                alt="logo"
                                className="img-fluid logo--custom"
                            />
                            <Nav vertical pills>
                                <NavItem>
                                    <Button
                                        color="outline-primary"
                                        className="btn-md btn-block"
                                        onClick={handleAdminChange}
                                    >
                                        Go To Home
                                    </Button>
                                </NavItem>
                                <NavItem>
                                    <Link
                                        to="/create-expense"
                                        className="link--custom"
                                    >
                                        Product Manager
                                    </Link>
                                </NavItem>
                                <NavItem>
                                    <Link
                                        to="/create-categories"
                                        className="link--custom"
                                    >
                                        Categories Manager
                                    </Link>
                                </NavItem>
                                <NavItem>
                                    <Link
                                        to="/create-user"
                                        className="link--custom"
                                    >
                                        User Manager
                                    </Link>
                                </NavItem>
                            </Nav>
                        </div>
                    </Col>
                    <Col lg="10">
                        <Switch>
                            <Route
                                path="/create-expense"
                                component={ProductManager}
                            />
                            <Route path="/create-categories">
                                <Categories key="categories-manager" />
                            </Route>
                            <Route path="/create-user">
                                <UserManager key="user-manager" />
                            </Route>
                            <Route path="*">
                                <NoMatch />
                            </Route>
                        </Switch>
                    </Col>
                </Row>
            </Router>
        </div>
    );
}
