import React, { useContext } from 'react';

import '../../assets/css/Modal_ProductDetail.css';

import { Row, Col } from 'antd';

import { ZoomInOutlined } from '@ant-design/icons';

import { Link } from 'react-router-dom';
import { ProductsContext } from '../../Contexts/ProductsContext';
import { set } from 'lodash';

function Modal_ProductDetail({ content, product }) {
    const { formatCash, changeToSlug } = React.useContext(ProductsContext);

    return (
        <>
            <div className="modal-productdetail">
                <Row>
                    <Col span={6}>
                        <div className="product-img-wrapper">
                            <img className="product-img" alt={`product-img`} src={product.image}></img>
                        </div>
                    </Col>
                    <Col span={18}>
                        <div className="product__quickInfo">
                            <input type="hidden" name="indexOfSelectedItem" value={content}></input>
                            <div className="product-name">
                                <Link to={`/product/${changeToSlug(product.name) + '-' + product.id}`}>
                                    {product.name}
                                </Link>
                            </div>
                            <div className="product-price">{formatCash(product.price.toString())}₫</div>
                            <div className="list-of-controls">
                                <div className="readmore-btn">
                                    <Link to={`/product/${changeToSlug(product.name) + '-' + product.id}`} style={{ color: 'white' }}>
                                        <span className="readmore-btn__title">Xem chi tiết </span>
                                    </Link>
                                    <ZoomInOutlined />
                                </div>
                            </div>
                        </div>
                    </Col>
                </Row>
                <Row>
                    <div className="product-description">{product.description.slice(0, 200)} ...</div>
                </Row>
            </div>
        </>
    );
}

export default Modal_ProductDetail;