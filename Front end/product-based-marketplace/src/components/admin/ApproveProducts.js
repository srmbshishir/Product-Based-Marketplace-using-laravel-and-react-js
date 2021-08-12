import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import { Link } from 'react-router-dom';

const ApproveProduct = () => {
    const url = `http://127.0.0.1:8000/api/admin/ApproveProduct`;
    const [userlist, setUserList] = useState([]);
    useFetch(url, setUserList);
    console.log(userlist);

    //search work
    const [key, setKey] = useState("");
    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/admin/showProduct/search/` + key)
        result = await result.json();
        console.log(result);
        setUserList(result);
    }

    //show all
    async function ShowAll() {
        let result = await fetch(`http://127.0.0.1:8000/api/admin/ApproveProduct`)
        result = await result.json();
        setUserList(result);
    }
    //Approve Product
    const [status, setStatus] = useState("");

    async function Approve(id) {
        const formData = new FormData();
        formData.append('status', status);
        // console.log(id);
        // console.log(status);
        let result = await fetch(`http://127.0.0.1:8000/api/admin/status/${id}`, {
            method: 'POST',
            // headers: {
            //     "Content-Type": "application/json",
            //     "Accept": 'application/json'
            // },
            body: formData
        });

        result = await result.json();
        localStorage.setItem("user-info", JSON.stringify(result));
        const message = localStorage.getItem('user-info')
        JSON.parse(message);
        alert(message);
    }

    return (
        <div>
            <Back></Back>
            <input type="text"
                placeholder="Type user id/type"
                name="search"
                onChange={(e) => setKey(e.target.value)}
            />
            <button onClick={Search}>Search</button>
            <button onClick={ShowAll}>Show All</button>
            <h1>Show Product and Approve</h1>
            <table style={{ "border": "1px solid" }} >
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Condition</td>
                    <td>Discount</td>
                    <td>Status</td>
                    <td>Seller Id</td>
                    <td>Action</td>
                </tr>
                {
                    userlist.map((item) =>
                        <tr>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{item.category}</td>
                            <td>{item.price}</td>
                            <td>{item.p_condition}</td>
                            <td>{item.discount}</td>
                            <td>{item.status}</td>
                            <td>{item.userid}</td>
                            <td>
                                <label for="status">Update Status:</label>

                                <select name="status"
                                    id="status"
                                    value={item.status}
                                    onChange={(e) => setStatus(e.target.value)}>
                                    <option value="pending">Pending</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button onClick={() => Approve(item.id)}>Change Status</button>
                            </td>
                        </tr>
                    )
                }
            </table >
        </div >
    );
};

export default ApproveProduct;