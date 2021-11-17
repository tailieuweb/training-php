import React, { useContext, useEffect, useRef, useState } from 'react';

import '../assets/css/ListOfProducts.css';

import { Row, Col } from 'antd';
import { Pagination } from 'antd';
import { Modal, Button } from 'antd';

import Modal_ProductDetail from './ModalBoxContent/Modal_ProductDetail';
import { ProductsContext } from '../Contexts/ProductsContext';
import { ShoppingCartContext } from '../Contexts/ShoppingCartContext';

import nextId from "react-id-generator";
import swal from 'sweetalert';
import { AuthContext } from '../Contexts/AuthContext';

function ListOfProducts(props) {
    const { products, formatCash } = useContext(ProductsContext);
    const { setIsStateCart } = useContext(ShoppingCartContext);
    const authCtx = useContext(AuthContext);

    // __________________________________________________
    // List of products:
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);
    const [pageStart, setPageStart] = useState(0);
    const [pageEnd, setPageEnd] = useState(0);
    const resultsPerPage = useRef(12);

    const onChange_PageNumber = (pageNumber) => {
        setCurrentPage(pageNumber);
    }

    const handleClickToBuy = (product) => {     
        const param = {
            id_product: product.id,
            quantity: 1,
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

    useEffect(() => {
        setTotalPages(Math.ceil(products.length / resultsPerPage.current));
    }, [totalPages, products.length]);

    useEffect(() => {
        setPageStart((currentPage - 1) * resultsPerPage.current);
        setPageEnd(pageStart + resultsPerPage.current - 1);
    }, [currentPage, pageStart, pageEnd]);


    // __________________________________________________
    // Modal box:
    const [isModalVisible, setIsModalVisible] = useState(false);
    const [indexOfSelectedItem, setIndexOfSelectedItem] = useState(-1);
    const [productSelected, setProductSelected] = useState({});

    const setContentInModal = (i, product) => {
        setIndexOfSelectedItem(i);
        setProductSelected(product);
        showModal();
    }

    const showModal = () => {
        setIsModalVisible(true);
    };

    const handleOk = () => {
        setIsModalVisible(false);
    };

    const handleCancel = () => {
        setIsModalVisible(false);
    };


    // __________________________________________________
    // Alert:
    const showFeedBackFor_SuccessfulTask = (title, msg) => {
        swal({
            title: title,
            text: msg,
            icon: "success",
            button: "Ok!",
        });
    }


    // __________________________________________________
    // Component:
    return (
        <>
            {/* List of products to be displayed: */}
            <div className="list-of-products">
                <div className="list-title">{`Danh sách sản phẩm`}</div>

                <div className="products">
                    <Row>
                        {
                            products.map((product, index) => {
                                if (index >= pageStart && index <= pageEnd) {
                                    return (
                                        <Col xs={12} sm={8} md={6} lg={6} xl={4} key={`product-item-${index}`} name={`product-item-${index}`}>
                                            <div className="product-quick-info">
                                                <div className="product-img-wrapper" onClick={() => { return setContentInModal(index, product); }}>
                                                    <img className="product-img" alt={`product-img`} src={product.image}></img>
                                                </div>
                                                <div className="product-quick-info-name" onClick={() => { return setContentInModal(index, product); }}>
                                                    {product.name}
                                                    <div className="hidden-div">...</div>
                                                </div>
                                                <div className="product-quick-info-price">{formatCash(product.price.toString())}₫</div>
                                                <button className="buy-btn" onClick={() => handleClickToBuy(product)}>Chọn mua</button>
                                            </div>
                                        </Col>
                                    );
                                }
                                else {
                                    return (null);
                                }
                            })
                        }
                    </Row>
                </div>

                <div className="products__pagination">
                    <Pagination current={currentPage} total={(totalPages * 10)} onChange={onChange_PageNumber} />
                </div>
            </div>

            {/* Product detail modal box: */}
            <div className="products__modalbox">
                <Modal title={`Thông tin sản phẩm #${indexOfSelectedItem}`} visible={isModalVisible} onOk={handleOk} onCancel={handleCancel}>
                    <Modal_ProductDetail product={productSelected} content={indexOfSelectedItem}></Modal_ProductDetail>
                </Modal>
            </div>
        </>
    );
}

export default ListOfProducts;