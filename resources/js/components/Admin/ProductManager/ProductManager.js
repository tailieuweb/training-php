import React from "react";
import { Navbar, NavbarBrand, Nav, Container, Row, Col } from 'reactstrap';
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import EditExpense from "./EditExpense"
import ExpensesList from "./ExpensesListing";
import CreateExpense from "./CreateExpense";

export default function ProductManager() {
    return (
        <Router>
            <div className="product-manager">
                <header className="App-header"> 
                    <Navbar>
                        <Container>
                            <NavbarBrand>
                                <Link
                                    to={"/create-expense"}
                                    className="nav-link"
                                >
                                    Product manager
                                </Link>
                            </NavbarBrand>

                            <Nav className="justify-content-end">
                                <Nav>
                                    <Link
                                        to={"/create-expense"}
                                        className="nav-link"
                                    >
                                        Create Product
                                    </Link>
                                    <Link
                                        to={"/expenses-listing"}
                                        className="nav-link"
                                    >
                                        Products List
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
                                        path="/create-expense"
                                        component={CreateExpense}
                                    />
                                    <Route
                                        path="/edit-expense/:id"
                                        component={EditExpense}
                                    />
                                    <Route
                                        path="/expenses-listing"
                                        component={ExpensesList}
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
