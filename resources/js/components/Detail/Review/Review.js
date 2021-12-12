import React, { useState, useEffect } from "react";
import {
    Button,
    Row,
    Col,
    Container,
    TabContent,
    TabPane,
    Nav,
    NavItem,
    NavLink,
    Card,
    CardText,
    Input,
    Modal,
    ModalHeader,
    ModalBody,
    ModalFooter,
} from "reactstrap";
import { Link } from "react-router-dom";
import axios from "axios";
import Swal from "sweetalert2";
import { AvForm, AvField } from "availity-reactstrap-validation";
import classnames from "classnames";

import "../../../../css/Review.css";
import Rating from "./Rating/Rating";
import { isArray } from "lodash";
import Rate from "./Rate/Rate";
export default function Review() {
    const [reviews, setReviews] = useState([]);
    const [products, setProducts] = useState([]);
    const [rating, setRating] = useState(1);
    const [productId, setProductId] = useState(0);
    const [reviewInfo, setReviewInfo] = useState({
        content: "",
    });
    const [activeTab, setActiveTab] = useState("1");

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios("http://localhost:8000/api/product/");
            setProducts(result.data);
            setProductId(result.data[0].id);
        };
        fetchData();
    }, []);

    const productSelected = products.map((res, i) => {
        return <ProductTab obj={res} key={i} />;
    });

    useEffect(() => {
        const fetchData = async () => {
            let tokenStr = localStorage.getItem("loginToken");
            const result = await axios(
                `http://localhost:8000/api/watch-comment-auth?product_id=${productId}`,
                {
                    headers: { Authorization: `Bearer ${tokenStr}` },
                }
            );
            if (isArray(result.data)) {
                setReviews(result.data);
            }
        };
        fetchData();
    }, [productId]);

    const toggle = (tab) => {
        if (activeTab !== tab) {
            setActiveTab(tab);
        }
    };

    const handleSelectChange = (e) => {
        const { name, value } = e.target;
        setProductId(() => value);
    };

    const handleChange = (e) => {
        const { name, value } = e.target;
        setReviewInfo((reviewInfo) => ({
            ...reviewInfo,
            [name]: value,
        }));
    };

    const handleOnValid = (event, value) => {
        let tokenStr = localStorage.getItem("loginToken");
        const reviewObj = {
            ...reviewInfo,
            rate: rating,
        };
        axios
            .post(
                `http://localhost:8000/api/product/${productId}/postComment`,
                reviewObj,
                {
                    headers: { Authorization: `Bearer ${tokenStr}` },
                }
            )
            .then((res) => {
                Swal.fire(
                    "Good job!",
                    "Review Added Successfully",
                    "success"
                ).then(() => {
                    window.location.reload(false);
                });
            })
            .catch((error) => {
                Swal.fire({
                    title: "Error!",
                    text: "Do you want to continue ?",
                    icon: "error",
                    confirmButtonText: "Cool",
                });
            });
    };

    const handleOnInvalid = (event, error) => {
        Swal.fire({
            title: "Error!",
            text: "Do you want to continue ?",
            icon: "error",
            confirmButtonText: "Cool",
        });
    };

    const renderReviews = reviews.map((res, i) => {
        return <ReviewContent obj={res} key={i} />;
    });

    return (
        <div className="review mt-5">
            <h2 className="review-title">REVIEWS</h2>
            <Container>
                <div>
                    <Nav tabs>
                        <NavItem>
                            <NavLink
                                className={classnames({
                                    active: activeTab === "1",
                                })}
                                onClick={() => {
                                    toggle("1");
                                }}
                            >
                                Reviews
                            </NavLink>
                        </NavItem>
                        <NavItem>
                            <NavLink
                                className={classnames({
                                    active: activeTab === "2",
                                })}
                                onClick={() => {
                                    toggle("2");
                                }}
                            >
                                Form Review
                            </NavLink>
                        </NavItem>
                    </Nav>
                    <TabContent activeTab={activeTab}>
                        <TabPane tabId="1">
                            <Input
                                type="select"
                                name="product_id"
                                id="productId"
                                value={productId.product_id}
                                onChange={handleSelectChange}
                            >
                                {productSelected}
                            </Input>
                            <hr />
                            <div className="review-content">
                                {renderReviews}
                            </div>
                        </TabPane>
                        <TabPane tabId="2">
                            <Card body>
                                <CardText>
                                    <Rating
                                        rating={rating}
                                        setRating={setRating}
                                    />
                                    <AvForm
                                        onValidSubmit={handleOnValid}
                                        onInvalidSubmit={handleOnInvalid}
                                    >
                                        <AvField
                                            name="content"
                                            label="Your review"
                                            type="textarea"
                                            placeholder="Your review..."
                                            value={reviewInfo.content}
                                            onChange={handleChange}
                                            validate={{
                                                required: {
                                                    value: true,
                                                    errorMessage:
                                                        "Please enter your review",
                                                },
                                            }}
                                        />
                                        <Button
                                            type="submit"
                                            color="success"
                                            className="btn-md btn-block"
                                        >
                                            Submit
                                        </Button>
                                    </AvForm>
                                </CardText>
                            </Card>
                        </TabPane>
                    </TabContent>
                </div>
            </Container>
        </div>
    );
}

function ProductTab(props) {
    return (
        <option value={props.obj.id} key={props.obj.id}>
            {props.obj.product_name}
        </option>
    );
}

function ReviewContent(props) {
    const [oldReviewData, setOldReviewData] = useState({
        content: props.obj.content,
        rate: props.obj.rate,
    });
    const [rating, setRating] = useState(props.obj.rate);
    const [reviewInfo, setReviewInfo] = useState({
        content: props.obj.content,
    });
    const [modal, setModal] = useState(false);

    const deleteReview = () => {
        const fetchData = async () => {
            const result = await axios(
                `http://localhost:8000/api/comment/${props.obj.id}`
            );
            const { data } = await result;
            return data;
        };
        fetchData()
            .then((res) => {
                if (res.comment) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let tokenStr = localStorage.getItem("loginToken");
                            axios
                                .delete(
                                    `http://localhost:8000/api/deleteComment/${props.obj.id}`,
                                    {
                                        headers: {
                                            Authorization: `Bearer ${tokenStr}`,
                                        },
                                    }
                                )
                                .then((res) => {
                                    Swal.fire(
                                        "Good job!",
                                        "Expense Delete Successfully",
                                        "success"
                                    ).then(() => {
                                        window.location.reload(false);
                                    });
                                })
                                .catch((error) => {
                                    Swal.fire({
                                        title: "You can't delete this comment !!!",
                                        text: "Do you want to continue ?",
                                        icon: "error",
                                        confirmButtonText: "Cool",
                                    })
                                });
                        }
                    });
                } else {
                    Swal.fire({
                        title: "This review no exist !!!",
                        text: "Do you want to continue ?",
                        icon: "error",
                        confirmButtonText: "Cool",
                    }).then(() => {
                        window.location.reload(false);
                    });
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const checkOldReviewData = (reviewData, oldReviewData, rating) => {
        let flag = true;
        if ( reviewData.content === oldReviewData.content
            && rating === oldReviewData.rate) flag = false;
        return flag;
    };

    const handleOnValid = (event, value) => {
        const fetchData = async () => {
            const result = await axios(
                `http://localhost:8000/api/comment/${props.obj.id}`
            );
            const { data } = await result;
            return data;
        };
        fetchData()
            .then((res) => {
                if (res.comment) {
                    const reviewObj = {
                        ...reviewInfo,
                        rate: rating,
                    };

                    if (checkOldReviewData(reviewObj, oldReviewData, rating)) {
                        Swal.fire({
                            title: "Do you want to save the changes?",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Save",
                            denyButtonText: `Don't save`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                let tokenStr =
                                    localStorage.getItem("loginToken");
                                axios
                                    .put(
                                        "http://localhost:8000/api/editComment/" +
                                            props.obj.id,
                                        reviewObj,
                                        {
                                            headers: {
                                                Authorization: `Bearer ${tokenStr}`,
                                            },
                                        }
                                    )
                                    .then(() => {
                                        Swal.fire("Saved!", "", "success").then(
                                            () => {
                                                window.location.reload(false);
                                            }
                                        );
                                    })
                                    .catch((error) => {
                                        Swal.fire({
                                            title: "You can't update this comment",
                                            text: "Do you want to continue ?",
                                            icon: "error",
                                            confirmButtonText: "Cool",
                                        });
                                    });
                            } else if (result.isDenied) {
                                Swal.fire("Changes are not saved", "", "info");
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Pls type anything you want to update!",
                            text: "Do you want to continue ?",
                            icon: "error",
                            confirmButtonText: "Cool",
                        });
                    }
                } else {
                    Swal.fire({
                        title: "This review no exist !!!",
                        text: "Do you want to continue ?",
                        icon: "error",
                        confirmButtonText: "Cool",
                    }).then(() => {
                        window.location.reload(false);
                    });
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const handleOnInvalid = (event, error, value) => {
        Swal.fire({
            title: "Error!",
            text: "Do you want to continue ?",
            icon: "error",
            confirmButtonText: "Cool",
        });
    };

    const handleChange = (e) => {
        const { name, value } = e.target;
        setReviewInfo((reviewInfo) => ({
            ...reviewInfo,
            [name]: value,
        }));
    };

    const toggle = () => {
        setModal(!modal);
    };

    return (
        <div>
            <Modal isOpen={modal} toggle={toggle}>
                <ModalHeader toggle={toggle}>Edit Review Form</ModalHeader>
                <ModalBody>
                    <Rating rating={rating} setRating={setRating} />
                    <AvForm
                        onValidSubmit={handleOnValid}
                        onInvalidSubmit={handleOnInvalid}
                    >
                        <AvField
                            name="content"
                            label="Your review"
                            type="textarea"
                            placeholder="Your review..."
                            value={reviewInfo.content}
                            onChange={handleChange}
                            validate={{
                                required: {
                                    value: true,
                                    errorMessage: "Please enter your review",
                                },
                            }}
                        />
                        <Button
                            type="submit"
                            color="success"
                            className="btn-md btn-block"
                        >
                            Update
                        </Button>
                    </AvForm>
                </ModalBody>
                <ModalFooter>
                    <Button color="secondary" onClick={toggle}>
                        Cancel
                    </Button>
                </ModalFooter>
            </Modal>

            <Row>
                <Col lg={11}>
                    <p className="review-date">{new Date(props.obj.updated_at).toDateString()}</p>
                    <h5 className="review-rating">Rate - <span className="review-rating-detail">{props.obj.rate}/5</span></h5>
                    <p className="review-content">{props.obj.content}</p>
                </Col>
                <Col lg={1}>
                    <Button
                        color="outline-success"
                        className="btn-sm btn-block"
                        onClick={toggle}
                    >
                        Edit
                    </Button>
                    <Button
                        color="outline-danger"
                        className="btn-sm btn-block"
                        onClick={deleteReview}
                    >
                        Delete
                    </Button>
                </Col>
            </Row>
            <hr />
        </div>
    );
}
