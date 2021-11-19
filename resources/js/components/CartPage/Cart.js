import React from 'react';
import "../../../css/addcart.css";
import Footer from "../Home/Footer";

export default function Cart() {
    return (
        <div className="content-cart">
            <div className="container cart mb-5 mt-5">
                <div className="row">
                    <div className="col-md-12">
                        <div className="cart-content ng-scope" >
                            <h1 className="title"><span>Giỏ hàng của tôi</span></h1>
                            <div className="steps clearfix">
                                <ul className="clearfix">
                                    <li className="cart glyphicon active col-md-2 col-xs-4 col-sm-4"><span><i className="glyphicon-cart"></i></span><span>Giỏ hàng</span><span className="step-number"><a>1</a></span></li>
                                </ul>
                            </div>
                            <div className="cart-block">
                                <div className="cart-info table-responsive">
                                    <table className="table product-list">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="item in OrderDetails" className="ng-scope">
                                                <td className="des">
                                                    <h2 className="ng-binding">DOWNLOADABLE</h2>
                                                    <span className="ng-binding"></span>
                                                </td>
                                                <td className="image">
                                                    <img className="img-fluid" src="http://runecom53.runtime.vn/Uploads/shop300/images/ghesofa/2.jpg" />
                                                </td>
                                                <td className="price ng-binding">58,000,000đ</td>
                                                <td className="quantity">
                                                    <input type="number" value="1" className="text ng-pristine ng-untouched ng-valid" />
                                                </td>
                                                <td className="amount ng-binding">
                                                    58,000,000đ
                                                </td>
                                                <td className="remove">
                                                    <a>
                                                        <i className="glyphicon glyphicon-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div className="clearfix text-right">
                                    <span><b>Tổng thanh toán:</b></span>
                                    <span className="pay-price ng-binding">
                                        58,000,000đ
                                    </span>
                                </div>
                                <div className="button text-right">
                                    <a className="btn btn-default">Tiếp tục mua hàng</a>
                                    <a className="btn btn-primary">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer />
        </div>



    )
}




