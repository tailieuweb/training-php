import React from "react";
import { Navbar, NavbarBrand, Nav, Container, Row, Col } from 'reactstrap';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import EditCategories from "./EditCategories";
import CategoriesList from "./CategoriesListing";
import CreateCategories from "./CreateCategories";

export default function Categories() {
    return (
        <Router>
            <div className="categories-manager">
                <header className="App-header">
                    <Navbar>
                        <Container>
                            <NavbarBrand>
                                <Link
                                    to={"/create-categories"}
                                    className="nav-link"
                                >
                                    Categories manager
                                </Link>
                            </NavbarBrand>

                            <Nav className="justify-content-end">
                                <Nav>
                                    <Link
                                        to={"/create-categories"}
                                        className="nav-link"
                                    >
                                        Create Categories
                                    </Link>
                                    <Link
                                        to={"/categories-listing"}
                                        className="nav-link"
                                    >
                                        Categories List
                                    </Link>
                                </Nav>
                            </Nav>
                        </Container>
                    </Navbar>
                </header>

                <Container>
                    <Row>
                        <Col md={12}>
                            <div className="wrapper">
                                <Switch>
                                    <Route
                                        exact
                                        path="/"
                                        component={CreateCategories}
                                    />
                                    <Route
                                        path="/create-categories"
                                        component={CreateCategories}
                                    />
                                    <Route
                                        path="/edit-categories/:id"
                                        component={EditCategories}
                                    />
                                    <Route
                                        path="/categories-listing"
                                        component={CategoriesList}
                                    />
                                </Switch>
                            </div>
                        </Col>
                    </Row>
                </Container>
            </div>
        </Router>
    );
}
