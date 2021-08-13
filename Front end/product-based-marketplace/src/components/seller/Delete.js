import React from 'react';
import Button from 'react-bootstrap/esm/Button';
import { useParams } from "react-router";
import { useHistory } from 'react-router';

const Delete = () => {

    const { id: eid } = useParams();
    const history = useHistory();

    async function DeleteProduct() {
        let result = await fetch(`http://127.0.0.1:8000/api/product/delete/${eid}`, {
            method: 'GET',
        });

        result = await result.json();
        localStorage.setItem("user-info", JSON.stringify(result));
        const message = localStorage.getItem('user-info')
        JSON.parse(message);
        alert(message);
        history.push(`/seller/showProduct`)
    }
    function No() {
        history.push(`/seller/showProduct`)
    }

    return (
        <div>
            <h1>Are you sure you want to delete?</h1>
            <Button variant="danger" onClick={DeleteProduct}>Yes</Button>
            <Button onClick={No}>No</Button>
        </div>
    );
};

export default Delete;