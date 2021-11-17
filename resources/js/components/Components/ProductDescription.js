import React, { useContext } from 'react';
import '../assets/css/ProductDescription.css';

const ProductDescription = ({product}) => {
    return (
        <React.Fragment>
            <div className="product-description">
                    <h1 className="title">Mô tả sản phẩm</h1>
                    <p>{product.description}</p>
                </div>
        </React.Fragment>
    );
}

export default ProductDescription;
