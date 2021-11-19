import React from "react";
import { Navbar, NavbarBrand, Nav, Container, Row, Col } from 'reactstrap';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import CreateUser from "./CreateUser";
import EditUser from "./EditUser";
import UserList from "./UsersListing";

export default function UserManager() {
    return (
        <Router>
            <div className="user-manager">
                <header className="App-header"> 
                    <Navbar>
                        <Container>
                            <NavbarBrand>
                                <Link
                                    to={"/create-user"}
                                    className="nav-link"
                                >
                                    User manager
                                </Link>
                            </NavbarBrand>
                            <Nav className="justify-content-end">
                                <Nav>
                                    <Link
                                        to={"/create-user"}
                                        className="nav-link"
                                    >
                                        Create User
                                    </Link>
                                    <Link
                                        to={"/user-listing"}
                                        className="nav-link"
                                    >
                                        User List
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
                                        path="/create-user"
                                        component={CreateUser}
                                    />
                                    <Route
                                        path="/edit-user/:id"
                                        component={EditUser}
                                    />
                                    <Route
                                        path="/user-listing"
                                        component={UserList}
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
