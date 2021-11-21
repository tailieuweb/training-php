import React, { useState, useEffect } from "react";
import {
    listUser
} from "../../server";

import './Dashboard.css';
import { Link } from 'react-router-dom';
import "../Home/Aminition/Home.css";
import dateFormat from 'dateformat';
import Axios from "axios";
import { Header } from "../Header/Header";
import { Footer } from "../Footer/Footer";
// Thư viện Bên thứ 3
import createDOMPurify from "dompurify";
const DOMPurify = createDOMPurify(window);

export function Dashboard() {
    const split = (params) => {
        var test1 = params.slice(11, 13);
        return test1;
    }
    const itemId = (id) => {
        return getRamdomString(6) + getRamdom(10000, 99999) + id + getRamdomString(8) + getRamdom(100, 999)
    }
    const [users, setUsers] = useState([]);
    useEffect(() => {
        const fetchAPI = async () => {
            setUsers(await listUser());
        };
        fetchAPI();
    }, []);

    const deleteUser = (id) => {
        async function fetchDeleteUser(id) {
            const repo = await Axios.get(`http://localhost/Passport/Passport/public/api/auth/destroy/${id}`, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + sessionStorage.getItem("myData")
                },
                body: JSON.stringify({ id: id })
            })
            return repo.data;
        }
        fetchDeleteUser(id)
            .then(result => {
                var idOld = split(id);
                const filterData = users.filter(item => item.id != idOld);
                setUsers(filterData)
            })
    }
    const getRamdom = (min, max) => {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    const getRamdomString = (length) => {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < length; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
    const getListUser = users.map((c) => {
        return (
            <li className="table-row" key={c.id}>
                <div className="col col-1" data-label="Job Id">#</div>
                <div className="col col-3" data-label="Customer Name">dangerouslySetInnerHTML={{_html:DOMPurify.sanitize(c.name)}}</div>
                <div className="col col-2" data-label="Amount">dangerouslySetInnerHTML={{_html:DOMPurify.sanitize(c.email)}}</div>
                <div className="col col-2" data-label="Payment Status">{dateFormat(c.created_at, "dd/mm/yyyy")}</div>
                <div className="col col-2" data-label="Payment Status">{dateFormat(c.updated_at, "dd/mm/yyyy")}</div>
                <div className="col col-2 custom-group-icon" data-label="Payment Status">
                    
                        <Link to={`/edit/${getRamdomString(6)}${getRamdom(10000, 99999)}${c.id}${getRamdomString(8)}${getRamdom(100, 999)}`}>
                            <i className="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </Link>
                        <button className="btnDel" onClick={e => { deleteUser(getRamdomString(6) + getRamdom(10000, 99999) + c.id + getRamdomString(8) + getRamdom(100, 999)) }}>
                            <i className="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                        </button>
                   
                </div>
            </li>
        );
    });
    return (
        <div className="dashboard-content">
            <div className="header">
                <Header />
            </div>
            <div className="dashboard-block">
                <div className="container">

                    <h2 className="user-title">Danh Sách Người Dùng</h2>
                    <ul className="responsive-table">
                        <li className="table-header">
                            <div className="col col-1">Id</div>
                            <div className="col col-3">Tên</div>
                            <div className="col col-2">Email</div>
                            <div className="col col-2">Ngày Tạo</div>
                            <div className="col col-2">Ngày Sửa</div>
                            <div className="col col-2">Hành Động</div>
                        </li>
                        {getListUser}
                    </ul>
                </div>
            </div>
            <Footer />
        </div>

    )
}
