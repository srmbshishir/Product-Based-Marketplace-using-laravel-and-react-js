import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import Button from 'react-bootstrap/esm/Button';
import Table from 'react-bootstrap/Table';
import { Context } from '../StoreUser';
import ReactToExcel from 'react-html-table-to-excel'

const ShowOrder = () => {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    const url = `http://127.0.0.1:8000/api/seller/showOrderList/${user[0].id}`;
    const [orderlist, setOrderList] = useState([]);
    useFetch(url, setOrderList);
    console.log(orderlist);

    //search work
    const [key, setKey] = useState("");
    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/seller/showOrder/search/${user[0].id}/` + key)
        result = await result.json();
        console.log(result);
        setOrderList(result);
    }

    //show all
    async function ShowAll() {
        let result = await fetch(`http://127.0.0.1:8000/api/seller/showOrderList/${user[0].id}`)
        result = await result.json();
        setOrderList(result);
    }
    //Track Order
    const [track, setTrack] = useState("");

    async function Approve(id) {
        const formData = new FormData();
        formData.append('track', track);
        // console.log(id);
        // console.log(status);
        let result = await fetch(`http://127.0.0.1:8000/api/seller/showOrder/${id}`, {
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
            <h1>Show Order and Update tracking</h1>

            <Table id="emp">
                <tr>
                    <td>Id</td>
                    <td>Product Id</td>
                    <td>Product Name</td>
                    <td>Buyer Id</td>
                    <td>Buyer Phone</td>
                    <td>Buyer Address</td>
                    <td>Quantity</td>
                    <td>Payment</td>
                    <td>Price</td>
                    <td>Date</td>
                    <td>Track status</td>
                    <td>Change Status</td>
                </tr>
                {
                    orderlist.map((item) =>
                        <tr>
                            <td>{item.id}</td>
                            <td>{item.productid}</td>
                            <td>{item.p_name}</td>
                            <td>{item.buyerid}</td>
                            <td>{item.buyerphone}</td>
                            <td>{item.buyer_address}</td>
                            <td>{item.quantity}</td>
                            <td>{item.payment}</td>
                            <td>{item.price}</td>
                            <td>{item.date}</td>
                            <td>{item.track}</td>

                            <td>
                                <label for="track">Update Tracking:</label>

                                <select name="track"
                                    id="track"
                                    classname="form-control"
                                    value={item.track}
                                    onChange={(e) => setTrack(e.target.value)}>
                                    <option value="order taken">Order Taken</option>
                                    <option value="Delivery man">Delivery Man Taken</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                                <Button variant="outline-dark" onClick={() => Approve(item.id)}>Change Order Status</Button>
                            </td>
                        </tr>
                    )
                }
            </Table >
            <div>
                <ReactToExcel
                    classname="btn"
                    table="emp"
                    filename="ReportExcel"
                    sheet="Sheet"
                    buttonText="Export excel" />
            </div>
        </div >
    );
};

export default ShowOrder;