import React from "react";
import { Link, useHistory } from "react-router-dom";
import { Button } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";

export default function ExpenseTableRow(props) {
    const history = useHistory();
    const subDescripton = (txtDesc) => {
        let temp = txtDesc + "";
        return temp.substr(0, 92);
    }
    const deleteExpense = () => {
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
                    .delete("http://localhost:8000/api/product/" + props.obj.id)
                    .then((res) => {
                        Swal.fire(
                            "Good job!",
                            "Expense Delete Successfully",
                            "success"
                        ).then(() => {
                            history.push("/create-expense");
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
            <td>{props.obj.product_name}</td>
            <td>{props.obj.category_id}</td>
            <td>{props.obj.quantity}</td>
            <td>$ {props.obj.price}</td>
            <td>
                {subDescripton(props.obj.description)}
                <Link to={"/edit-expense/" + props.obj.id}>
                     ...
                </Link>
            </td>
            <td>
                <Link
                    className="edit-link"
                    to={"/edit-expense/" + props.obj.id}
                >
                    <Button className="btn-sm btn-block mb-2" color="success">
                        Edit
                    </Button>
                </Link>
                <Button
                    onClick={deleteExpense}
                    className="btn-sm btn-block"
                    color="danger"
                >
                    Delete
                </Button>
            </td>
        </tr>
    );
}
