import React, { useState, useContext } from 'react';
import '../assets/css/ProductDetail.css';

import { Row, Col, Image, InputNumber } from 'antd';
import { ShoppingCartContext } from '../Contexts/ShoppingCartContext';
import nextId from "react-id-generator";
import { AuthContext } from '../Contexts/AuthContext';


const ProductDetail = ({ product }) => {

    const {  setIsStateCart, formatCash } = useContext(ShoppingCartContext);
    const [productQuantity, setProductQuantity] = useState(1);
    const authCtx = useContext(AuthContext);

    const handleChange = (value) => {
        setProductQuantity(value);
    }

    const handleClickToBuy = () => {
        const param = {
            id_product: product.id,
            quantity: productQuantity,
        }
        axios.post('/api/add-to-cart', param, {
            headers: {
                Authorization: `Bearer ${authCtx.token}`
            }
        })
            .then((response) => {
                setIsStateCart(false)
                swal(
                    response.data,
                    `Bạn đã thêm "${product.name}" vào giỏ hàng.`,
                    'success'
                )
            })
    }

    return (
        <React.Fragment>
            <div className="product-detail">
                <Row className="product-detail-row" gutter={16}>
                    <Col xs={24} lg={12}>
                        <div className="product-img-wrapper">
                            <Image
                                className="logo"
                                className="product-img"
                                src={product.image}
                                alt={`product-img`}
                            />
                        </div>
                    </Col>
                    <Col xs={24} lg={12} className="component-layout">
                        <div className="product__sellingInfo">
                            <div className="product-name">{product.name}</div>
                            <div className="product-price">{formatCash((product.price * productQuantity).toString())}₫</div>
                            <div className="quantity">
                                <label htmlFor="quantityField">Số lượng:</label>
                                <InputNumber id="quantityField" min={1} max={100000} defaultValue={productQuantity} onChange={handleChange} />
                            </div>
                            <button className="buy-btn" onClick={handleClickToBuy}>Chọn mua</button>
                        </div>
                    </Col>
                </Row>
            </div>
        </React.Fragment>
    );
}

export default ProductDetail;
