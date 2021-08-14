import React, { Component } from 'react';
import { useState } from 'react';
import Back from './Back';
import { useFetch } from '../UseFetch';
import Table from 'react-bootstrap/esm/Table';
import Button from 'react-bootstrap/esm/Button';
import { Context } from '../StoreUser';
import ReactHTMLTableToExcel from 'react-html-table-to-excel';



const SellerDashboard = () => {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    const [income, setIncome] = useState("");
    const [monthincome, setMonthincome] = useState([]);
    const [pending, setPending] = useState("");

    const [data, setData] = useState([]);

    // async function See() {
    //     let result = await fetch(`http://127.0.0.1:8000/api/admin/dashboard/`);
    //     result = await result.json();
    //     setData("shauwa");
    //     console.log(data);
    // }

    const url = `http://127.0.0.1:8000/api/seller/dashboard/${user[0].id}`;
    useFetch(url, setData);
    console.log(data);


    function See() {
        setIncome(data['total_income'][0].total_income);
        setMonthincome(data['current_month_income'][0].month_income);
        setPending(data['pending'][0].pending);
        console.log(pending);
        if (monthincome == "") {
            setMonthincome(0);
        }
    }


    return (
        <div>
            <h1>Dashboard page</h1>
            <Button onClick={See}>Show</Button>

            <h1>Total transaction : {income}</h1>
            <h1>Income in this month : {monthincome}</h1>
            <h1>Orders pending : {pending}</h1>
            <Back></Back>
        </div>
    );
};

export default SellerDashboard;