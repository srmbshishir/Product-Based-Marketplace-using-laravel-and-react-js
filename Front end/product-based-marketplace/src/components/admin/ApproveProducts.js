import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import { Link } from 'react-router-dom';
import Button from 'react-bootstrap/esm/Button';
import Table from 'react-bootstrap/Table'

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

    const mystyle = {
        width: 100,
        height: 100,
        // CSS CODE
    };

    return (
        <div>
            <Back></Back>
            <input type="text"
                placeholder="Type user id/type"
                name="search"
                onChange={(e) => setKey(e.target.value)}
            />
            <Button variant="outline-dark" onClick={Search}>Search</Button>
            <br></br>
            <Button onClick={ShowAll}>Show All</Button>
            <h1>Show Product and Approve</h1>

            <Table striped bordered hover>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Condition</td>
                    <td>Discount</td>
                    <td>Status</td>
                    <td>Seller Id</td>
                    <td>Image</td>
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
                            <img src={`../upload/${item.image}`} style={mystyle}></img>
                            <td>
                                <label for="status">Update Status:</label>

                                <select name="status"
                                    id="status"
                                    classname="form-control"
                                    value={item.status}
                                    onChange={(e) => setStatus(e.target.value)}>
                                    <option value="pending">Pending</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <Button variant="outline-dark" onClick={() => Approve(item.id)}>Change Status</Button>
                            </td>
                        </tr>
                    )
                }
            </Table >
        </div >
    );
};

export default ApproveProduct;