import React, { useContext, useEffect, useState } from 'react';

import '../../assets/css/HeaderLayout.css';
// import '../../assets/css/Container.css';

import { AuthContext } from '../../Contexts/AuthContext';
import LogOut from '../../Components/LogOut/LogOut';

import { Col, Input, Row, Menu, Dropdown, Avatar, Badge } from 'antd';
import { DownOutlined, UserOutlined, ShoppingCartOutlined, SearchOutlined } from '@ant-design/icons';
import { logo } from '../../Services/images.service';
import { Link } from 'react-router-dom';
import { ProductsContext } from '../../Contexts/ProductsContext';
import axios from 'axios';
import swal from 'sweetalert';
import { set } from 'lodash';
const { Search } = Input;

const HeaderLayout = (props) => {
  const authCtx = useContext(AuthContext);
  const {setProducts, isStateProducts, setIsStateProducts} = useContext(ProductsContext);

  const [username, setUsername] = useState('Unknown');
  const [isStateSearch, setIsStateSearch] = useState(false)

  const onSearch = key => {
    if(key.length == 0) {
      axios.get(`/api/products`, {
        headers: {
            Authorization: `Bearer ${authCtx.token}`
        }
    })
        .then((response) => {
            setProducts(response.data)
            setIsStateSearch(false)
        })
    }
    else {
      axios.get(`/api/search/${key}`, {
        headers: {
            Authorization: `Bearer ${authCtx.token}`
        }
    })
        .then((response) => {
          setProducts(response.data)
          setIsStateSearch(true)
          swal(
            '',
            `Đã tìm thấy ${response.data.length} sản phẩm !!`,
            'success'
        )
       
        })
    }
    
  };

  const onChange = e => {
    if(isStateSearch && e.target.value.length == 0) {
      axios.get(`/api/products`, {
        headers: {
            Authorization: `Bearer ${authCtx.token}`
        }
    })
        .then((response) => {
            setProducts(response.data)
            setIsStateSearch(false)
        })
        isStateSearch(false)
    }
  }

  const searchBox = () => {
    return (
      <Search placeholder="Search something"
        allowClear
        onSearch={onSearch}
        onChange={onChange }
        enterButton
        enterButton="Search"
        className="search-box"
      />
    );
  }

  const menu = () => {
    if (authCtx.isLoggedIn === true) {
      return (
        <Menu>
          <Menu.Item key="btn-logout">
            <LogOut />
          </Menu.Item>
        </Menu>
      );
    }
    else {
      return (
        <Menu>
          <Menu.Item key="btn-login">
            <Link to="/login">
              Login
            </Link>
          </Menu.Item>
          <Menu.Item key="btn-register">
            <Link to="/register">
              Register
            </Link>
          </Menu.Item>
        </Menu>
      );
    }
  }

  useEffect(() => {
    if (authCtx.isLoggedIn) {
      if (typeof authCtx.data !== "undefined" && authCtx.data !== null) {
        setUsername(authCtx.data.name);
      }
      else {
        setUsername('Unknown');
      }
    }
  })

  return (
    <div className="header">
      <div className="container">
        <div className="header-wrapper">
          <div className="header__left-section">
            <Link to="/" className="logo-wrapper">
              <img className="logo" src={logo}></img>
            </Link>
          </div>
          <div className="header__controls-section">
            <label
              className="bars-btn"
              htmlFor=""
              onClick={() => { return props.setIsChecked(!props.isChecked); }}
            >
              <div className="hamburger-btn">
                <div className="bar"></div>
              </div>
            </label>

            {searchBox()}

            <label className="search-btn-wrapper" htmlFor="checkbox-for-MegaMenu">
              <div className="search-btn">
                <SearchOutlined />
                <input type="checkbox" name="" id="checkbox-for-MegaMenu"></input>
                <label className="overlay" htmlFor="checkbox-for-MegaMenu"></label>
                <div className="mega-menu">
                  {searchBox()}
                </div>
              </div>
            </label>
          </div>
          <div className="header__right-section">
            <Link className="cart-btn" to="/shopping-cart">
              <ShoppingCartOutlined className="cart-icon" />
              <span className="cart-btn__title">Shopping cart</span>
            </Link>
            <Dropdown overlay={menu} arrow placement="bottomRight">
              <div className="account-btn">
                <Avatar className="avt" size="small" icon={<UserOutlined />} className="user-icon" />
                <span className="account-btn__title">{authCtx.isLoggedIn ? username : 'Account'}</span>
                <DownOutlined />
              </div>
            </Dropdown>
          </div>
        </div>
      </div>
    </div>

  );
}

export default HeaderLayout;