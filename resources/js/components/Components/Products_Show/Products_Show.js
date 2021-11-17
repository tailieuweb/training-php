import React, { useEffect, useState, useContext } from 'react'
import axios from 'axios';
import { AuthContext } from '../../Contexts/AuthContext';
import Product from './MinorComponents/Product';
import { Row, Col } from 'antd';

function Products_Show() {
    const authCtx = useContext(AuthContext)
    const [products, setProducts] = useState([]);

    useEffect(() => {
        axios.get('/api/products', {
            headers: {
                Authorization: `Bearer ${authCtx.token}`
            }
        })
            .then((response) => {
                setProducts(response.data)
            })
    }
        , []);

    return (
        <React.Fragment>
            <Row align='middle' justify='center' gutter={16}>
                {
                    products.map((pro, index) => {
                        return (
                            <Col key={index} className="gutter-row" span={6}>
                                <Product  {...pro} />
                            </Col>
                        )
                    })
                }
            </Row>
        </React.Fragment>
    )
}

export default Products_Show

