import React from 'react';

import '../assets/css/FooterSection.css';

import paymentMethods from '../Services/paymentMethods.service';

import { Row, Col } from 'antd';
import { FacebookFilled, YoutubeFilled, TwitterSquareFilled } from '@ant-design/icons';

function FooterSection(props) {
    return (
        <div className="footer-wrapper">
            <div className="container">
                <div className="footer-top">
                    <Row>
                        <Col md={12} className="block-moreinfo">
                            <div className="info">
                                <div className="hotline">Tổng đài: 5555.8888 - 035.589.3589</div>
                                <div>(1000đ/phút , từ 8:00 đến 21:00 mỗi ngày)</div>
                            </div>
                        </Col>
                        <Col md={12} className="block-moreinfo">
                            <div className="info"><div>Đặt online giao tận nhà ĐÚNG GIỜ</div>
                                <div>Đổi, trả sản phẩm trong 7 ngày</div>
                            </div>
                        </Col>
                    </Row>
                </div>

                <div className="footer-body">
                    <Row>
                        <Col xs={24} sm={12} md={8} lg={6} xl={6}>
                            <div className="block">
                                <div className="block-title">Hỗ trợ khách hàng</div>
                                <div className="block-content">
                                    <ul className="list-of-links">
                                        <li className="link">Các câu hỏi thường gặp</li>
                                        <li className="link">Gửi yêu cầu hỗ trợ</li>
                                        <li className="link">Hướng dẫn đặt hàng</li>
                                        <li className="link">Phương thức vận chuyển</li>
                                        <li className="link">Chính sách đổi trả</li>
                                        <li className="link">Hướng dẫn trả góp</li>
                                        <li className="link">Chính sách hàng nhập khẩu</li>
                                        <li className="link">Hỗ trợ khách hàng: support@tech.vn</li>
                                        <li className="link">Báo lỗi bảo mật: security@tech.vn</li>
                                    </ul>
                                </div>
                            </div>
                        </Col>
                        <Col xs={24} sm={12} md={8} lg={6} xl={6}>
                            <div className="block">
                                <div className="block-title">Về chúng tôi</div>
                                <div className="block-content">
                                    <ul className="list-of-links">
                                        <li className="link">Giới thiệu Tech</li>
                                        <li className="link">Tuyển Dụng</li>
                                        <li className="link">Chính sách bảo mật thanh toán</li>
                                        <li className="link">Chính sách bảo mật thông tin cá nhân</li>
                                        <li className="link">Chính sách giải quyết khiếu nại</li>
                                        <li className="link">Điều khoản sử dụng</li>
                                    </ul>
                                </div>
                            </div>
                        </Col>
                        <Col xs={24} sm={12} md={8} lg={6} xl={6}>
                            <div className="block">
                                <div className="block-title">Phương thức thanh toán</div>
                                <div className="block-content">
                                    <ul className="list-of-icons">
                                        <li className="icon"><img className="icon" src={paymentMethods.payment_1} width="54" alt=""></img></li>
                                        <li className="icon"><img className="icon" src={paymentMethods.payment_2} width="54" alt=""></img></li>
                                    </ul>
                                </div>
                            </div>
                        </Col>
                        <Col xs={24} sm={12} md={8} lg={6} xl={6}>
                            <div className="block">
                                <div className="block-title">Kết nối với chúng tôi</div>
                                <div className="block-content">
                                    <ul className="list-of-icons">
                                        <li className="icon"><FacebookFilled style={{ fontSize: '30px', color: 'steelblue' }} /></li>
                                        <li className="icon"><YoutubeFilled style={{ fontSize: '30px', color: '#cc0018' }} /></li>
                                        <li className="icon"><TwitterSquareFilled style={{ fontSize: '30px', color: '#cornflowerblue' }} /></li>
                                    </ul>
                                </div>
                            </div>
                        </Col>
                    </Row>
                </div>

                <div className="footer-bottom">
                    <Row>
                        <Col md={12}>
                            <div className="block">
                                <div className="block-title">Địa chỉ văn phòng</div>
                                <div className="block-content">
                                    <div className="paragraph-highlighted">35 Thiên Thời, phường Địa Lợi,<br></br> quận Nhân Hòa, thành phố Hồ Chí Minh.</div>
                                    <div className="paragraph">Chúng tôi nhận đặt hàng trực tuyến và giao hàng tận nơi cho khác hàng, cũng hỗ trợ mua và nhận hàng trực tiếp tại văn phòng hoặc trung tâm xử lý đơn hàng.</div>
                                </div>
                            </div>
                        </Col>
                    </Row>
                </div>
            </div>
        </div>
    );
}

export default FooterSection;