import React, { useState, useEffect } from "react";
import "../../../css/Home.css";
import Footer from "./Footer";
import SlideShow from "./SlideShow";
import TrendingCategories from "./TrendingCategories";
import TrendingProduct from "./TrendingProduct";

const productData = [
    {
        id: 0,
        name: "Product 1",
        category: 0,
        price: "$120",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-22_320x.jpg?v=1609296610",
        reciept: 100,
    },
    {
        id: 1,
        name: "Product 2",
        category: 0,
        price: "$120.15",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-17_320x.jpg?v=1609296612",
        reciept: 100,
    },
    {
        id: 2,
        name: "Product 3",
        category: 1,
        price: "$11.99",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-29_320x.jpg?v=1609296625",
        reciept: 100,
    },
    {
        id: 3,
        name: "Product 4",
        category: 1,
        price: "$130.99",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-26_320x.jpg?v=1609296621",
        reciept: 100,
    },
    {
        id: 4,
        name: "Product 5",
        category: 0,
        price: "$11.99",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-26_320x.jpg?v=1609296621",
        reciept: 100,
    },
    {
        id: 5,
        name: "Product 6",
        category: 0,
        price: "$6.15",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-12_320x.jpg?v=1609296595",
        reciept: 100,
    },
    {
        id: 6,
        name: "Product 7",
        category: 1,
        price: "$8.99",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/1-5_320x.jpg?v=1609296589",
        reciept: 100,
    },
    {
        id: 7,
        name: "Product 8",
        category: 1,
        price: "$124.99",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/products/8-3_320x.jpg?v=1609296596",
        reciept: 100,
    },
];

const categoriesData = [
    {
        id: 0,
        caption: "Categories 1",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h04_slider01_1080x.jpg?v=1612541171",
    },
    {
        id: 1,
        caption: "Categories 2",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h04_slider02_1080x.jpg?v=1612541170s",
    },
    {
        id: 2,
        caption: "Categories 3",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h7-s1_1080x.jpg?v=1612888560",
    },
    {
        id: 3,
        caption: "Categories 4",
        img: "https://cdn.shopify.com/s/files/1/0076/1708/5530/files/h7-s2_1296x.jpg?v=1612888560",
    },
];

export default function Home() {
    const [productList, setProductList] = useState([]);
    const [categoriesList, setCategoriesList] = useState([]);

    useEffect(() => {
        setProductList([...productData]);
        setCategoriesList([...categoriesData]);
    }, []);

    return (
        <div className="home">
            {/* Slide Show */}
            <SlideShow categoriesList={categoriesList.slice(0, 3)} />
            {/* Trending Categories */}
            <TrendingCategories
                productList={productList.slice(0, 3)}
                categoriesList={categoriesList.slice(0, 3)}
            />
            {/* Trending Products */}
            <TrendingProduct productList={productList} />
            {/* Footer */}
            <Footer />
        </div>
    );
}
