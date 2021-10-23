import React from 'react'
import { Card } from 'antd';
const { Meta } = Card;
import { Row, Col } from 'antd';

function Product(props) {
    return (
        <React.Fragment>
            <Row align='middle' justify='center' gutter={16}>
                <Col span={24}>
                    <Card
                        hoverable
                        style={{ width: '100%', margin: '20px 0' }}
                        cover={<img alt="example" src={props.image} />}
                    >
                        <Meta title={props.name} description={`${props.price} VND`} />
                    </Card>
                </Col>
            </Row>

        </React.Fragment>
    )
}

export default Product
