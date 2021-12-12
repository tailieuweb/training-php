import React, { useState, useEffect } from "react";
import { Col, Row } from "reactstrap";
import "../../../css/TrendingCategories.css";
export default function TrendingCategories() {
  const [productList, setProductList] = useState([]);
  const [categoriesList, setCategoriesList] = useState([]);

  useEffect (() => {
    const fetchData = async () => {
      const result = await axios(
          "http://localhost:8000/api/home-page-lastest-product/"
      );
      setProductList(result.data.products);
      setCategoriesList(result.data.categories);
  };
  fetchData();
  }, []);

  const findCategory = (arr, query) => {
    let result = arr.find((el) => {
      return el.id === query.category_id;
    })  
    return result? result.name : null;
  }

  const trendingCategory = productList.map((product) => {
    return (
      <Col key={product.id}>
        <div className="trending-categories-info">
          <img className="trending-category-product-img img-fluid" src={product.product_image} alt={product.product_name} />
          <div className="info-detail">
            <p className="trending-category-title"># {findCategory(categoriesList, product)}</p>
            <p className="trending-category-product-title">{product.product_name}</p>
          </div>
        </div>
      </Col>
    );
  });
  return (
    <div className="trending-categories container-fluid mt-5">
      <Row xs="1" sm="1" md="3">
        {trendingCategory}
      </Row>
    </div>
  );
}