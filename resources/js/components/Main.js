import React, { useState, useEffect } from "react";
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
} from "reactstrap";
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useLocation,
} from "react-router-dom";
import "../../css/Main.css";

//Components
import Home from "./Home/Home";
import Login from "./Login/Login";
import Register from "./Login/Register";
import Detail from "./Detail/Detail";
import Cart from "./CartPage/Cart";
export default function Main() {
    //Account Data
    const [accountData, setAccountData] = useState([
        {
            id: 0,
            username: "pn0921997@gmail.com",
            password: "1234567",
            fullname: "Phuong Nguyen",
            birthday: "1997-02-09",
            phone: "0123456789",
        },
        {
            id: 1,
            username: "vyvy09021997@gmail.com",
            password: "321",
            fullname: "Nguyen Phuong",
            birthday: "1997-02-09",
            phone: "9876543210",
        },
    ]);

    //Local Info Login User
    const [isLogin, setIsLogin] = useState({
        id: "none",
        username: "none",
        password: "none",
        fullname: "none",
        birthday: "none",
        isLoginStatus: false,
    });

    //State of navbar
    const [collapsed, setCollapsed] = useState(true);
    const toggleNavbar = () => setCollapsed(!collapsed);

  return (
    <div className="main">
      <Router>
        <Navbar
          color="dark"
          dark
          key="navbar"
          className="main-navbar container-fluid"
        >
          <NavbarBrand href="/" className="mr-auto">
            <img
              src="https://cdn.shopify.com/s/files/1/0076/1708/5530/files/logo_white_360x.png?v=1612539402"
              alt="uneox logo"
              className="img-fluid navbar--custom-logo"
            />
          </NavbarBrand>
          {/* search bar */}
          <div className = "search-box">
          <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search"/>
                <button class="btn btn-outline-warning mr-4 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          <NavbarToggler onClick={toggleNavbar} className="mr-2" />
          <Collapse isOpen={!collapsed} navbar>
            <Nav navbar>
              <NavItem className="mb-3">
                <Link to="/" className="main-navbar--custom-link">
                  Home
                </Link>
              </NavItem>
              <NavItem className="mb-3">
                <Link to="/login" className="main-navbar--custom-link">
                  {isLogin.isLoginStatus ? isLogin.username : "Login"}
                </Link>
              </NavItem>
              <NavItem className="mb-3">
                <Link to="/register" className="main-navbar--custom-link">
                  Register
                </Link>
              </NavItem>
            </Nav>
          </Collapse>
        </Navbar>

                {/* A <Switch> looks through its children <Route>s and
            renders the first one that matches the current URL. */}
                <Switch>
                    <Route path="/login">
                        <Login
                            key="login"
                            accountData={accountData}
                            setIsLogin={setIsLogin}
                            isLogin={isLogin}
                        />
                    </Route>
                    <Route path="/register">
                        <Register
                            key="register"
                            accountData={accountData}
                            setAccountData={setAccountData}
                        />
                    </Route>
                    <Route path="/product-detail">
                        <Detail key="product-detail"/>
                    </Route>
                    <Route path="/cart">
                        <Cart
                            key="cart"
                        />
                    </Route>
                    <Route path="/">
                        <Home key="home" />
                    </Route>
               
                    <Route path="*">
                        <NoMatch />
                    </Route>
                </Switch>
            </Router>
        </div>
    );
}

function NoMatch() {
    let location = useLocation();

    return (
        <div>
            <h3>
                No match for <code>{location.pathname}</code>
            </h3>
        </div>
    );
}
