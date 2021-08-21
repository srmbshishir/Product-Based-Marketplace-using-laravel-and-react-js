import React from 'react';
import { useFetch } from './UseFetch';
import { useState } from 'react';
import { Link } from 'react-router-dom';
import Button from 'react-bootstrap/Button';
import { Context } from './StoreUser';

const Home = () => {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    const url = `http://127.0.0.1:8000/api/welcome/all`;
    const [productlist, setProductList] = useState([]);
    useFetch(url, setProductList);
    console.log(productlist);

    //search work
    const [key, setKey] = useState("");
    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/welcome/search/` + key)
        result = await result.json();
        console.log(result);
        setProductList(result);
    }

    //show all
    async function ShowAll() {
        let result = await fetch(`http://127.0.0.1:8000/api/welcome/all`)
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
            <input type="text"
                placeholder="Type user id/type"
                name="search"
                onChange={(e) => setKey(e.target.value)}
            />
            <Button variant="outline-dark" onClick={Search}>Search</Button>
            <br></br>
            <Button onClick={ShowAll}>Show All</Button>
            <h1>Products</h1>
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
                    <td>Edit Product</td>
                    <td>Delete</td>

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
                                <Link to={`registration`}>Add to Cart</Link>
                            </td>
                        </tr>
                    )
                }
            </table>
            <h1>There is no end, register and see more products</h1>
        </div >
    );
};

export default Home;