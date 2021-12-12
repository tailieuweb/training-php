import React, { useState, useEffect } from "react";
import { Button, Row, Col } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Link } from "react-router-dom";
import "../../../../css/EditExpense.css";

export default function EditExpense(props) {
    const [oldExpense, setOldExpense] = useState({
        product_name: "",
        description: "",
        quantity: "",
        price: "",
        category_id: "",
        product_image: "",
    });

    const [expense, setExpense] = useState({
        id: 0,
        product_name: "",
        description: "",
        quantity: "",
        price: "",
        category_id: "",
        product_image: "",
    });

    const [categoryList, setCategoryList] = useState([]);

    //Get categories list
    useEffect(() => {
        const fetchData = async () => {
            const result = await axios.get(
                "http://localhost:8000/api/category/"
            );
            const { data } = await result;
            setCategoryList(data);
        };
        fetchData();
    }, []);

    //Create Categories Select options
    const categoriesSelect = categoryList.map((value, index) => {
        return <option value={value.id}>{value.name}</option>;
    });

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios.get(
                "http://localhost:8000/api/product/" + props.match.params.id
            );
            const { data } = await result;
            setExpense(data);
            setOldExpense(data);
        };
        fetchData();
    }, []);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setExpense((expense) => ({
            ...expense,
            [name]: value,
        }));
    };

    const checkOldExpense = (expense, oldExpense) => {
        let flag = true;
        if (
            expense.product_name === oldExpense.product_name &&
            expense.description === oldExpense.description &&
            expense.quantity === oldExpense.quantity &&
            expense.price === oldExpense.price &&
            expense.category_id === oldExpense.category_id &&
            expense.product_image === oldExpense.product_image
        ) {
            flag = false;
        }
        return flag;
    };

    const handleOnValid = (event, value) => {
        const fetchData = async () => {
            const result = await axios.get(
                `http://localhost:8000/api/product/${expense.id}}`
            );
            const { data } = await result;
            return data;
        };

        fetchData()
            .then((res) => {
                if (!res.message) {
                    const expenseObject = {
                        ...expense,
                    };

                    if (checkOldExpense(expense, oldExpense)) {
                        Swal.fire({
                            title: "Do you want to save the changes?",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: "Save",
                            denyButtonText: `Don't save`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                axios
                                    .patch(
                                        "http://localhost:8000/api/product/" +
                                            props.match.params.id,
                                        expenseObject
                                    )
                                    .catch((error) => {
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Do you want to continue ?",
                                            icon: "error",
                                            confirmButtonText: "Cool",
                                        });
                                    });
    
                                Swal.fire("Saved!", "", "success").then(() => {
                                    props.history.push(
                                        `/edit-expense/${props.match.params.id}`
                                    );
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
                        title: "This product not exist !!",
                        text: "Do you want to continue ?",
                        icon: "error",
                        confirmButtonText: "Cool",
                    }).then(() => {
                        props.history.push(`/expenses-listing`);
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

    return (
        <div className="form-wrapper">
            <AvForm
                onValidSubmit={handleOnValid}
                onInvalidSubmit={handleOnInvalid}
            >
                <Row>
                    <Col lg="6" md="6" sm="12">
                        <AvField
                            name="product_name"
                            label="Name"
                            type="text"
                            value={expense.product_name}
                            onChange={handleChange}
                            validate={{
                                required: {
                                    value: true,
                                    errorMessage: "Please enter product name",
                                },
                            }}
                        />
                    </Col>
                    <Col lg="6" md="6" sm="12">
                        <AvField
                            name="category_id"
                            label="Category"
                            type="select"
                            value={expense.category_id}
                            onChange={handleChange}
                        >
                            {categoriesSelect}
                        </AvField>
                    </Col>
                </Row>
                <Row>
                    <Col lg="4" md="4" sm="12">
                        <AvField
                            name="quantity"
                            label="Quantity"
                            type="number"
                            value={expense.quantity}
                            onChange={handleChange}
                            validate={{
                                required: {
                                    value: true,
                                    errorMessage: "Please enter product name",
                                },
                            }}
                        />
                    </Col>
                    <Col lg="4" md="4" sm="12">
                        <AvField
                            name="price"
                            label="Price"
                            type="number"
                            value={expense.price}
                            onChange={handleChange}
                            validate={{
                                required: {
                                    value: true,
                                    errorMessage: "Please enter product name",
                                },
                            }}
                        />
                    </Col>
                    <Col lg="4" md="4" sm="12">
                        <AvField
                            name="product_image"
                            label="Image"
                            type="file"
                            accept="image/png, image/gif, image/jpeg"
                            onChange={handleChange}
                        />
                    </Col>
                </Row>
                <AvField
                    name="description"
                    label="Description"
                    type="textarea"
                    className="text-area-custom"
                    value={expense.id}
                    onChange={handleChange}
                />
                <Button
                    type="submit"
                    color="danger"
                    className="btn-md btn-block mb-2"
                >
                    UPDATE
                </Button>
                <Link to="/expenses-listing">
                    <Button
                        color="danger"
                        outline
                        className="btn-md btn-block mb-2"
                    >
                        BACK
                    </Button>
                </Link>
            </AvForm>
        </div>
    );
}
