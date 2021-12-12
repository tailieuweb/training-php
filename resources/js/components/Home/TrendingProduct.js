import React, { useState, useEffect } from "react";
import { Row, Col, Button } from "reactstrap";
import "../../../css/TrendingProduct.css";
import Swal from "sweetalert2";
export default function TrendingProduct() {
    const [productList, setProductList] = useState([]); 
    const [product_qty, setQuantity] = useState(1);

    useEffect (() => {
        const fetchData = async () => {
          const result = await axios(
              "http://localhost:8000/api/productIsBoughtMuch/"
          );
          setProductList(result.data[1]);
      };
      fetchData();
      }, []);

    const trendingList = productList.slice(0, 4).map((product) => {
        const submitAddcart = (e) => {
            e.preventDefault();
            const data = {
                product_id: product.id,
                quantity:product_qty
                
            }
           
            let tokenStr = localStorage.getItem("loginToken");
            axios.post("http://localhost:8000/api/cart_create/", data, {
                headers: { Authorization: `Bearer ${tokenStr}` },
    
            }).then((res) => {
                Swal.fire(
                    "Good job!",
                    "Create cart Successfully",
                    "success"
                );
               
            }).catch((err) => {
                Swal.fire({
                    title: "Please go login!!!",
                    text: "Do you want to continue ?",
                    icon: "error",
                    confirmButtonText: "Cool",
                });
                console.log(err);
            });
    
        }
        return (
            <Col key={product.id}>
                <div className="trending-product-info">
                    <div className="product-action--action">
                        <img
                            src={product.product_image}
                            alt={product.product_name}
                            className="img-fluid"
                        />
                        <div className="action-cart">
                            <Button onClick={submitAddcart} color="danger" outline className="btn-block">
                                Add Cart
                            </Button>
                        </div>
                    </div>

                    <div className="info-detail">
                        <p className="info-detail-name">{product.product_name}</p>
                        <p className="info-detail-price">$ {product.price}</p>
                    </div>
                </div>
            </Col>
        );
    });

    return (
        <div className="trending-product container-fluid mt-5">
            <div className="trending-product-introduce">
                <h1>Trending Product</h1>
                <p>
                    Find a bright ideal to suit your taste with our great
                    selection of suspension, wall, floor and table lights.
                </p>
            </div>
            <Row xs="1" sm="2" md="4">
                {trendingList}
            </Row>
        </div>
    );
}
