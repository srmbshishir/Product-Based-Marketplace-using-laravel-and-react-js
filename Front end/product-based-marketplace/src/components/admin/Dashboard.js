import React, { Component } from 'react';
import { useState } from 'react';
import Back from './Back';
import { useFetch } from '../UseFetch';
import Table from 'react-bootstrap/esm/Table';
import Button from 'react-bootstrap/esm/Button';


const Dashboard = () => {
    const [sum, setSum] = useState("");
    const [seller, setSeller] = useState([]);
    const [data, setData] = useState([]);

    // async function See() {
    //     let result = await fetch(`http://127.0.0.1:8000/api/admin/dashboard/`);
    //     result = await result.json();
    //     setData("shauwa");
    //     console.log(data);
    // }

    const url = `http://127.0.0.1:8000/api/admin/dashboard/`;
    useFetch(url, setData);
    console.log(data);


    function See() {
        setSum(data['total_income'][0].sum);
        setSeller(data['seller']);
        console.log(seller);
    }



    return (
        <div>
            <h1>Dashboard page</h1>
            <Button onClick={See}>Show</Button>

            <h1>Total transaction through this website is TK. {sum}</h1>
            <h1>Top Seller table</h1>
            <Table striped bordered hover>
                <tr>
                    <td>Seller Id</td>
                    <td>Item Sum</td>
                </tr>
                {seller.map((item) =>
                    <tr>
                        <td>{item.sellerid}</td>
                        <td>{item.sum}</td>
                    </tr>
                )}
            </Table>
            <Back></Back>
        </div>
    );
};

export default Dashboard;