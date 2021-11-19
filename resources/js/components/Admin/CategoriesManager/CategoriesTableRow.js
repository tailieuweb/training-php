import React from "react";
import { Link, useHistory } from "react-router-dom";
import { Button } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";

export default function CategoriesTableRow(props) {
    const history = useHistory();
    const subDescripton = (txtDesc) => {
        let temp = txtDesc + "";
        return temp.substr(0, 26);
    }
    const deleteCategories = () => {
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
                axios
                    .delete("http://localhost:8000/api/category/" + props.obj.id)
                    .then((res) => {
                        Swal.fire(
                            "Good job!",
                            "Categories Delete Successfully",
                            "success"
                        ).then(() => {
                            history.push("/create-categories");
                        })
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }

        });

    };

    return (
        <tr>
            <td></td>
            <td>{props.obj.name}</td>
            <td>{subDescripton(props.obj.description)}</td>

            <td>
                <Link
                    className="edit-link"
                    to={"/edit-categories/" + props.obj.id}
                >
                    <Button className="btn-sm btn-block mb-2" color="success">
                        Edit
                    </Button>
                </Link>
                <Button
                    onClick={deleteCategories}
                    className="btn-sm btn-block"
                    color="danger"
                >
                    Delete
                </Button>
            </td>
        </tr>
    );
}
