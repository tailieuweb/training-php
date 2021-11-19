import React, { useState } from "react";
import { Button, Row, Col } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { error } from "jquery";
import CategoriesList from "./CategoriesListing";

export default function CreateCategories(props) {
    const [category, setExpense] = useState({
        name: "",
        description: "",
        image: "",
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setExpense((category) => ({
            ...category,
            [name]: value,
        }));
        console.table(category);
    };

    const handleOnValid = (event, value) => {
        const expenseObject = {
            ...category,
        };
        axios
            .post("http://localhost:8000/api/category/", expenseObject)
            .then((res) => {
                Swal.fire("Good job!", "Categories Added Successfully", "success")
                    .then(() => {
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

    return (
        <div className="form-wrapper">
           <div className="container">
           <AvForm
                onValidSubmit={handleOnValid}
                onInvalidSubmit={handleOnInvalid}
            >
                <Row>
                    <Col lg="6" md="6" sm="12">
                        <AvField
                            name="name"
                            label="Name"
                            type="text"
                            placeholder="Categories Name..."
                            value={category.name}
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
                            name="image"
                            label="Image"
                            type="file"
                            accept="image/png, image/gif, image/jpeg"
                            value={category.image}
                            onChange={handleChange}
                        />
                    </Col>
                </Row>
                <AvField
                    name="description"
                    label="Description"
                    type="textarea"
                    placeholder="Description ..."
                    value={category.description}
                    onChange={handleChange}
                />
                <Button
                    type="submit"
                    color="primary"
                    className="btn-md btn-block"
                >
                    SUBMIT
                </Button>
            </AvForm>
           </div>
            <br></br>
            <br></br>
            <CategoriesList></CategoriesList>
        </div>
    );
}
