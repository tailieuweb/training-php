import { Button } from 'antd';
import '../assets/css/ShoppingCartPay.css';
import React from 'react';

const ShoppingCartPay = ({productsWasClicked, formatCash}) => {
    let total = 0;
    if(productsWasClicked && productsWasClicked.length > 0) {
        productsWasClicked.map(product => {
            total += product.price * product.quantity;
        });
    }
    return (
        <React.Fragment>
            <div className="place-of-delivery">
                <div className="heading">
                    <p className="title-place">Giao tới</p>
                    <p className="change-button">Thay đổi</p>
                </div>
                <div className="title">
                    <p className="user-name">Lê Liêm</p>
                    <p className="user-number">(0123) 456 789</p>
                </div>
                <div className="address">
                    <p>35, Huỳnh Tú, Phường 05, Quận 11, Hồ Chí Minh</p>
                </div>
            </div>

            <div className="prices-total">
              <div className="total-box">
                <p className="total-title">Tổng cộng: </p>
                <p className="total-field">{total == 0 ? 'Vui lòng chọn sản phẩm' : `${formatCash(total.toString())}₫`}</p>
                
              </div>
                <Button  className="submit" type="primary" danger>Mua hàng</Button>
            </div>


        </React.Fragment>
    );
}

export default ShoppingCartPay;
