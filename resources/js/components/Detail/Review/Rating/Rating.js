import React, { useState } from "react";
import { Row, Col } from "reactstrap";
import Rate from "../Rate/Rate";

const Rating = ({  rating, setRating }) => {
    return (
        <>
            <Row>
                <Col lg={12}>
                    <Rate
                        rating={rating}
                        onRating={(rate) => {
                            setRating(rate);
                        }}
                    />
                    <p>Rating - {rating}</p>
                </Col>
            </Row>
        </>
    );
};
export default Rating;
