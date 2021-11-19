import React, { Component } from 'react'
import '../../../css/RelatedContent.css';
export default class RelatedContent extends Component {
    render() {
        return (
            <div>
                <div className="container">
                    <div className="row mt-5">
                        {/*Sản phẩm liên quan cùng categories*/}
                        <div className="related-product">
                            <div className="title-related">
                                <h3>Related Products</h3>
                            </div>
                            <div className="row my-5">
                                <div className="col-md-3">
                                    <img src="https://product.hstatic.net/200000065946/product/pro_nau_ghe_bang_dai_vline_601_noi_that_moho_7_22b003008324475dbebfca89386cf72e_grande.png" width="100%" height="75%"></img>
                                    <div className="related-content">
                                        <p>Ghế Băng Dài Gỗ Cao Su Tự nhiên MOHO VLINE 602</p>
                                        <div className="related-price">
                                            <p>799,000₫</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-3">
                                    <img src="https://product.hstatic.net/200000065946/product/pro_mau_tu_nhien_noi_that_moho_ghe_an_odessa_2e9569c22c6d45749107e0a44f6c4d9c_master.png" width="100%" height="75%"></img>
                                    <div className="related-content">
                                        <p>Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO ODESSA</p>
                                        <div className="related-price">
                                            <p>899,000₫</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-3">
                                    <img src="https://product.hstatic.net/200000065946/product/pro_mau_tu_nhien_ghe_an_go_torino_11092c6f4b2d40c9a4587b48f49268b7_master.png" width="100%" height="75%"></img>
                                    <div className="related-content">
                                        <p>Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO MILAN 601 Màu Đen</p>
                                        <div className="related-price">
                                            <p>799,000₫</p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-3">
                                    <img src="https://product.hstatic.net/200000065946/product/pro_den_noi_that_moho_ghe_an_milan_02_8220c68bac384a06b54a4a4b28d4ca0c_grande.png" width="100%" height="75%"></img>
                                    <div className="related-content">
                                        <p>Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO OSLO 601</p>
                                        <div className="related-price">
                                            <p>899,000₫</p>
                                        </div>
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
