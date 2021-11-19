import React, { useState, useEffect } from "react";
import { Button, Row, Col } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";
import { AvForm, AvField } from "availity-reactstrap-validation";
import { Link } from "react-router-dom";

export default function EditCategories(props) {
    const [category, setExpense] = useState({
        name: "",
        description: "",
        category_image: "",
    });

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios.get(
                "http://localhost:8000/api/category/" + props.match.params.id
            );
            const { data } = await result;
            setExpense(data);
        };
        fetchData();
    }, []);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setExpense((category) => ({
            ...category,
            [name]: value,
        }));
    };

    const handleOnValid = (event, value) => {
        const expenseObject = {
            ...category,
        };

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
                        "http://localhost:8000/api/category/" +
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

                Swal.fire("Saved!", "", "success")
                    .then(() => {
                        props.history.push(`/edit-categories/${props.match.params.id}`);
                    });
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info")
            }
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
                                name="categories_image"
                                label="Image"
                                type="file"
                                accept="image/png, image/gif, image/jpeg"
                                value={category.category_image}
                                onChange={handleChange}
                            />
                        </Col>
                    </Row>
                    <AvField
                        name="description"
                        label="Description"
                        type="textarea"
                        className="text-area-custom"v
                        value={category.description}
                        onChange={handleChange}
                    />
                    <Button
                        type="submit"
                        color="danger"
                        className="btn-md btn-block mb-2"
                    >
                        UPDATE
                    </Button>
                    <Link to="/categories-listing">
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
        </div>
    );
}
