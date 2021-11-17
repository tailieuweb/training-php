import React, { useContext, useEffect, useState } from 'react'

import '../assets/css/Container.css';
import '../assets/css/ShoppingCartPage.css';
import '../assets/css/LayoutWrapper.css';

import { Layout, Row, Col } from 'antd';
import CartList from '../Components/ShoppingCart/CartList'
import ShoppingCartPay from '../Components/ShoppingCartPay';
import { ShoppingCartContext } from '../Contexts/ShoppingCartContext';
import LayoutWrapper from '../Components/LayoutWrapper';
import { AuthContext } from '../Contexts/AuthContext';
import HeaderLayout from '../Components/Layouts/HeaderLayout';
import FooterSection from '../Components/FooterSection';

function ShoppingCartPage() {

    // useState
    const [productsWasClicked, setProductsWasClicked] = useState([]);

    // Context
    const { SC_products, setSC_Products, isStateCart, setIsStateCart, formatCash } = useContext(ShoppingCartContext);

    const authCtx = useContext(AuthContext)

    useEffect(() => {
        axios.post('/api/cart', {}, {
            headers: {
                Authorization: `Bearer ${authCtx.token}`
            }
        })
            .then((response) => {
                console.log(response)
                if(response.data == 'Your cart is empty!') {
                    setSC_Products([])
                } else {
                    setSC_Products(response.data)
                    setIsStateCart(false)
                }

            })
    }, [isStateCart])

    // Handle Event
    const handleProductWasClicked = (productsWasClicked) => {
        setProductsWasClicked(productsWasClicked);
    }

    const handleSetQuantity = (quantity, record) => {
        let newProductsWasList = [];
        productsWasClicked.map(productWasClicked => {
            if(productWasClicked.id_product = record.id_product) {
                productWasClicked.quantity = quantity;
            }
            newProductsWasList.push(productWasClicked);
        })
        const params = {
            id_product: record.id_product,
            quantity,
        }
        axios.post('/api/update-cart', params, {
            headers: {
                Authorization: `Bearer ${authCtx.token}`
            }
        })
            .then((response) => {
                setIsStateCart(true)
            })
    }

    function handleDeleteProduct(record) {
        const params = {
            id_product: record.id_product,
        }
        axios.post('/api/delete-item-in-cart', params, {
            headers: {
                Authorization: `Bearer ${authCtx.token}`
            }
        })
            .then((response) => {
                setProductsWasClicked(record);
                setIsStateCart(true)
            })
    }

    // const mainContent = () => {
    //     return (
    //         <Layout>
    //             <div className="container">
    //                 <h1 className="shopping-cart-page-title">Giỏ hàng</h1>
    //                 <Row gutter={16}>
    //                     <Col xs={24} lg={16}>
    //                         <CartList
    //                             formatCash={formatCash}
    //                             handleSetQuantity={handleSetQuantity}
    //                             productList={SC_products}
    //                             handleProductWasClicked={handleProductWasClicked}
    //                             handleDeleteProduct={handleDeleteProduct} />
    //                     </Col>
    //                     <Col xs={24} lg={8}>
    //                         <ShoppingCartPay
    //                             formatCash={formatCash}
    //                             productsWasClicked={productsWasClicked} />
    //                     </Col>
    //                 </Row>
    //             </div>
    //         </Layout>
    //     );
    // }

    return (
        <>
         <HeaderLayout />
             <Layout>     
                <div className="container">
                    <h1 className="shopping-cart-page-title">Giỏ hàng</h1>
                    <Row gutter={16}>
                        <Col xs={24} lg={16}>
                            <CartList
                                formatCash={formatCash}
                                handleSetQuantity={handleSetQuantity}
                                productList={SC_products}
                                handleProductWasClicked={handleProductWasClicked}
                                handleDeleteProduct={handleDeleteProduct} />
                        </Col>
                        <Col xs={24} lg={8}>
                            <ShoppingCartPay
                                formatCash={formatCash}
                                productsWasClicked={productsWasClicked} />
                        </Col>
                    </Row>
                </div>
            </Layout>
            <FooterSection />
        </>
    )
}

export default ShoppingCartPage
