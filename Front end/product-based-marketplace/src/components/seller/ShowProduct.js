import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import { Link } from 'react-router-dom';
import Button from 'react-bootstrap/Button';
import { Context } from '../StoreUser';

const ShowProduct = () => {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    const url = `http://127.0.0.1:8000/api/seller/showProduct/${user[0].id}`;
    const [productlist, setProductList] = useState([]);
    useFetch(url, setProductList);
    console.log(productlist);

    //search work
    const [key, setKey] = useState("");
    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/seller/showProduct/search/${user[0].id}/` + key)
        result = await result.json();
        console.log(result);
        setProductList(result);
    }

    //show all
    async function ShowAll() {
        let result = await fetch(`http://127.0.0.1:8000/api/seller/showProduct/${user[0].id}`)
        result = await result.json();
        setProductList(result);
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
            <h1>Show User Page</h1>
            <table striped bordered hover>
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Condition</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Description</td>
                    <td>Image</td>
                </tr>
                {
                    productlist.map((item) =>
                        <tr>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{item.p_condition}</td>
                            <td>{item.category}</td>
                            <td>{item.price}</td>
                            <td>{item.quantity}</td>
                            <td>{item.description}</td>
                            <td><img src={`../upload/${item.image}`} style={mystyle}></img></td>

                            <td>
                                <Link to={`edit/${item.id}`}> EDIT</Link>
                            </td>
                        </tr>
                    )
                }
            </table>
        </div >
    );
};

export default ShowProduct;