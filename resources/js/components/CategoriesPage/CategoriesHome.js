import React, { useState } from "react";
import { Col, Row } from 'reactstrap';
import { Link } from "react-router-dom";
import "../../../css/CategoriesHome.css";
import { Button, Container } from "react-bootstrap";


const categories_images = [
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
    {
        id: 4,
        name: "Studio Chair",
        category: 0,
        price: "$120.00",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/6-14_360x.jpg?v=1609342334",
    },
    {
        id: 5,
        name: "Bird Stool",
        category: 0,
        price: "$147.52",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/3-8_360x.jpg?v=1609342211",
    },
]
const menu = [
    { item: "All items", class: "active" },
    { item: "Shelf" },
    { item: "Table" },
    { item: "Bed" },
    { item: "Stools & Chair" },
];
export default function CategoriesHome() {
    const [active, setActive] = useState(0);

    const handleClick = (index) => {
        setActive(index);
    };
    return (
        <Container>
            <div className="categories-home">
                {<div className="content-categories">
                    <Row>
                        <div className="menu-item">
                            {menu.map((e, index) => (
                                <Link
                                    onClick={() => handleClick(index)}
                                    className={active === index ? "active" : ""}
                                    key={index}
                                    to="#"
                                >
                                    {e.item}
                                </Link>
                            ))}
                        </div>
                        {categories_images.map((e, index) => (
                            <Col key={index} md="4">
                                <div className="product-images-catagories">
                                    <img src={e.img} />
                                    <div class="btn-add-cart">
                                        <Button className="btn-block btn">
                                            Add Cart
                                        </Button>
                                    </div>
                                    {/* <Link className="btn-cart" to="">
                                        Add Cart &nbsp; <i class="far fa-image"></i>
                                    </Link> */}
                                </div>
                                <div className="product-title-categories">
                                    <p>{e.name}</p>
                                </div>
                                <div className="product-price-categories">
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
