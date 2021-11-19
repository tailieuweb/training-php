import React, { useState, useEffect } from "react";
import axios from "axios";
import { Table } from 'reactstrap';
import CategoriesTableRow from "./CategoriesTableRow";

export default function CategoriesList(props) {
    const [categories, setExpenses] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios("http://localhost:8000/api/category/");
            setExpenses(result.data);
        };
        fetchData();
    }, []);

    const DataTable = categories.map((res, i) => {
        return <CategoriesTableRow obj={res} key={i} />;
    });

    return (
        <div className="table-wrapper">
            <Table striped hover>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>{DataTable}</tbody>
            </Table>
        </div>
    );
}
