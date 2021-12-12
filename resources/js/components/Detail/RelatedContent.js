import React, { useState } from "react";
import { Col, Row } from 'reactstrap';
import { Link } from "react-router-dom";
import "../../../css/RelatedContent.css";
import { Button, Container } from "react-bootstrap";
const related_product = [
    {
        id: 0,
        name: "Afteroom Barstool",
        category: 0,
        price: "$150.40",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/8-2_360x.jpg?v=1609296589",
    },
    {
        id: 1,
        name: "Chipperfield w102",
        category: 0,
        price: "$126.06",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/8-4_320x.jpg?v=1609296610",
    },
    {
        id: 2,
        name: "Miro Dining Table",
        category: 0,
        price: "$113.70",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/7-5_360x.jpg?v=1609296608",
    },
    {
        id: 3,
        name: "UNA chair",
        category: 0,
        price: "$102.84",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/8-6_360x.jpg?v=1609296626",
    },
]
export default function RelatedContent() {
    const [active, setActive] = useState(0);

    const handleClick = (index) => {
        setActive(index);
    };
    return (
        <Container>
            <div className="related">
                <p>Related Product</p>
            </div>
            <div className="related-detail">
                {<div className="related-content">
                    <Row>
                        {related_product.map((e, index) => (
                            <Col key={index} md="3">
                                <div className="related-image">
                                    <img src={e.img} />
                                   {/*  <div class="btn-add-cart">
                                        <Button outline className="btn-block">
                                            Add Cart
                                        </Button>
                                    </div> */}
                                    {/* <Link className="btn-cart" to="">
                                        Add Cart &nbsp; <i class="far fa-image"></i>
                                    </Link> */}
                                </div>
                                <div className="related-title">
                                    <p>{e.name}</p>
                                </div>
                                <div className="related-price">
                                    <p>{e.price}</p>
                                </div>
                            </Col>
                        ))}
                    </Row>
                </div>}
            </div>
        </Container>
    )
}

