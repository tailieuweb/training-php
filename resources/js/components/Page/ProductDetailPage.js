import React, { useContext, useEffect, useState } from 'react';

import '../assets/css/Container.css';
import '../assets/css/ProductDetailPage.css';

import { Row, Col, Layout } from 'antd';
import ProductDetail from '../Components/ProductDetail';
import ProductDescription from '../Components/ProductDescription';
import ProductComment from '../Components/ProductComment';
import { Redirect } from 'react-router-dom/cjs/react-router-dom.min';
import { ProductsContext } from '../Contexts/ProductsContext';
import LayoutWrapper from '../Components/LayoutWrapper';
import { AuthContext } from '../Contexts/AuthContext';
import axios from 'axios';
import { useParams } from 'react-router';

function ProductDetailPage(props) {
  const {slug} = useParams();

  const authCtx = useContext(AuthContext); 
  const [product, setProduct] = useState({
    id: -1,
    name: 'Unknown',
    description: 'Unknown',
    image: 'Unknown',
    price: 0,
    category: 0,
  })

  useEffect(() => {
    axios.get(`/api/product/${slug}`,  {
      headers: {
          Authorization: `Bearer ${authCtx.token}`
      }}).then(function(res) {
      setProduct(res.data[0])
    })
  }, [])

  const mainContent = () => {
    return (
      <Layout>
        <div className="container">
          <ProductDetail product={product} />
          <Row gutter={16}>
            <Col className="component-layout" xs={24} lg={12}>
              <ProductDescription product={product} />
            </Col>
            <Col className="component-layout" xs={24} lg={12}>
              <ProductComment product={product} />
            </Col>
          </Row>
        </ div>
      </Layout>
    );
  }

  return (
    <React.Fragment>
      {
        product ? (

          <LayoutWrapper mainContent={mainContent}></LayoutWrapper>

        ) : <Redirect to="/home" />
      }
    </React.Fragment>
  );
}

export default ProductDetailPage;