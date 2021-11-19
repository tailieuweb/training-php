import React from "react";
import { Link, useHistory } from "react-router-dom";
import { Button } from "reactstrap";
import axios from "axios";
import Swal from "sweetalert2";

export default function UserTableRow(props) {
    const history = useHistory();
    const subAddress = (txtAddress) => {
        let temp = txtAddress + "";
        return temp.substr(0, 20);
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
                    .delete("http://localhost:8000/api/user/" + props.obj.id)
                    .then((res) => {
                        Swal.fire(
                            "Good job!",
                            "Expense Delete Successfully",
                            "success"
                        ).then(() => {
                            history.push("/create-user");
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
            <td>{props.obj.Username}</td>
            <td>{props.obj.email}</td>
            <td>{props.obj.phone}</td>
            <td>{props.obj.Type}</td>
            <td>  {subAddress(props.obj.address)}</td>
            <td>
                <Link
                    className="edit-link"
                    to={"/edit-user/" + props.obj.id}
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
