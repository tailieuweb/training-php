import React from "react";
import { Col, Row } from "reactstrap";
import "../../../css/TrendingCategories.css";
export default function TrendingCategories({ productList, categoriesList }) {
  
  const trendingCategory = productList.map((product) => {
    return (
      <Col key={product.id}>
        <div className="trending-categories-info">
          <img className="trending-category-product-img img-fluid" src={product.img} alt={product.name} />
          <div className="info-detail">
            <p className="trending-category-title"># {product.category}</p>
            <p className="trending-category-product-title">{product.name}</p>
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