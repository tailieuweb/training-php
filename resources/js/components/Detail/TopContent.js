import axios from 'axios';
import React, { Component } from 'react';
import "../../../css/TopContent.css";
export default class TopContent extends Component {

    render() {
      /*   try{
            const url = 'http://127.0.0.1:8000/api/product_detail?id';
            const reponse = await axios.get(url);
            console.log(reponse);
        }
        catch(error){
            console.log('Failed to fetch products: ', error);
        } */
        return (
            <div className="detail">
                <div className="detail-header">
                    <h1>Detail Product</h1>
                </div>
                <div className="container">
                <div className="row">
                        <div className="col-md-6">
                            <div className="img-detail">
                                <img src="//product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ghe_an_pallermo_2265922503c242a98a1662e68fc16a70_master.png" width="100%" height="100%" />
                            </div>
                        </div>
                        <div className="col-md-6">
                            <div className="header-detail">
                                <div className="titlle-detail my-3">
                                    <h3>Ghế Ăn Gỗ Tần Bì Tự Nhiên PALLERMO</h3>
                                </div>
                                <div className="quantity-review">
                                    <p>Đánh giá: </p>
                                    <div className="like">
                                        <button type="button" id="btn-like">
                                            <i className="far fa-thumbs-up" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                {/* Nội dung chi tiết sản phẩm */}
                                <div className="description-detail">
                                    <p><b>Kích thước:</b> Dài 52cm x Rộng 58cm x Cao đến đệm ngồi/lưng tựa 50cm/78cm <br />
                                        <b> Chất liệu:</b> <br />
                                        - Gỗ tần bì tự nhiên <br />
                                        - Vải bọc polyester chống nhăn, kháng bụi bẩn và nấm mốc <br />
                                        Chống thấm, cong vênh, trầy xước, mối mọt
                                    </p>
                                </div>
                                <div className="price-detail">
                                    <h4>1,390,000₫</h4>
                                </div>
                                <div className="quantity">
                                    <input type="button" value="+" className="qty-btn" />
                                    <input type="text" value="1" min="1" className="select-quantity" />
                                    <input type="button" value="-" className="qty-btn" />
                                </div>
                                <div className="add-product-cart">
                                    <button type="button" className="btn-3"><span>Thêm vào giỏ</span></button>
                                </div>
                            </div>
                            {/* Xem đánh giá sản phẩm */}
                             <div className="review-product">
                                <div className="review-title">
                                <h4 class="mt-5">Review</h4>
                                </div>
                                <div className="user-review">
                                    <div className="name-user">
                                        <p>Nhu</p>
                                    </div>
                                    <div className="icon-review">
                                        <span><i className="fas fa-star"></i></span>
                                        <span><i className="fas fa-star"></i></span>
                                        <span><i className="fas fa-star"></i></span>
                                        <span><i className="fas fa-star"></i></span>
                                        <span><i className="fas fa-star"></i></span>
                                    </div>
                                    <div className="review-content mt-3">
                                        <p>Sản phẩm tuyệt vời</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
