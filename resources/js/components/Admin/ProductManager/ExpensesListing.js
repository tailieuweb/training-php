import React, { useState, useEffect } from "react";
import axios from "axios";
import { Table } from 'reactstrap';
import ExpenseTableRow from "./ExpenseTableRow";

export default function ExpenseList(props) {
    const [expenses, setExpenses] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios("http://localhost:8000/api/product/");   
            setExpenses(result.data);
        };
        fetchData();
    }, []);

    const DataTable = expenses.map((res, i) => {
        return <ExpenseTableRow obj={res} key={i} />;
    });

    return (
        <div className="table-wrapper">
            <Table striped hover>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>{DataTable}</tbody>
            </Table>
        </div>
    );
}
