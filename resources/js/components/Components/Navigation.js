import React, { useContext, useEffect, useState } from 'react'
import '../assets/css/Navigation.css'
import { Menu } from 'antd';
import { MenuFoldOutlined } from '@ant-design/icons';
import { AuthContext } from '../Contexts/AuthContext';
import { CategoriesContext } from '../Contexts/CategoriesContext';
import { ProductsContext } from '../Contexts/ProductsContext';
import { set } from 'lodash';

const { SubMenu } = Menu;

// submenu keys of first level
const rootSubmenuKeys = ['sub1', 'sub2', 'sub3'];


function Navigation(props) {
  const [openKeys, setOpenKeys] = React.useState(['sub1']);

  const authCtx = useContext(AuthContext);
  const [categories, setCategories] = useState([]);
  const {setProducts, setStateProducts} = useContext(ProductsContext);

  useEffect(() => {
      axios.get('/api/categories', {
          headers: {
              Authorization: `Bearer ${authCtx.token}`
          }
      })
          .then((response) => {
              setCategories(response.data)
          })
  }, [])


  const handleMenuClick = (e) => {
    if(e.key == 0) {
      axios.get(`/api/products`, {
        headers: {
            Authorization: `Bearer ${authCtx.token}`
        }
    })
        .then((response) => {
           if(response.data != 'Products not found') {
              setProducts(response.data)
           }
        })
    }
    else {
      axios.get(`/api/category/${e.key}`, {
        headers: {
            Authorization: `Bearer ${authCtx.token}`
        }
    })
        .then((response) => {
           if(response.data != 'Products not found') {
              setProducts(response.data)
           }
        })
    }
  
  }

  const onOpenChange = keys => {

    const latestOpenKey = keys.find(key => openKeys.indexOf(key) === -1);
    if (rootSubmenuKeys.indexOf(latestOpenKey) === -1) {
      setOpenKeys(keys);
    } else {
      setOpenKeys(latestOpenKey ? [latestOpenKey] : []);
    }
  };
  return (
    <div className="nav" style={{ width: '100%' }}>
      <h1 className="nav-title">
        <nav className="title">Product categories </nav>
        <MenuFoldOutlined className="nav-icon" />
        <div className="close-btn" onClick={() => { return props.setIsChecked(!props.isChecked); }}>X</div>
      </h1>
      <Menu
        mode="inline"
        theme="light"
        onOpenChange={onOpenChange}
        openKeys={openKeys}
      >
        <SubMenu key={0} title="Tất cả" onTitleClick={handleMenuClick} />
        {
          categories.map( cate => {
            return (
              <SubMenu key={cate.id} title={cate.name} onTitleClick={handleMenuClick} />
            )
          })
        }
      </Menu>
    </div>
  )
}

export default Navigation