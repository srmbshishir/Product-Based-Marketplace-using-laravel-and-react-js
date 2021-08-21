import React from 'react';
import { useState } from "react";
import Back from './Back';
import validator from 'validator'
import Button from 'react-bootstrap/esm/Button';
import { Context } from '../StoreUser';
import { useHistory } from 'react-router';

function AddUser() {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;
    const history = useHistory();

    const [name, setName] = useState("");
    const [condition, setCondition] = useState("");
    const [price, setPrice] = useState("");
    const [category, setCategory] = useState("");
    const [discount, setDiscount] = useState("");
    const [quantity, setQuantity] = useState("");
    const [description, setDescription] = useState("");
    const [image, setImage] = useState("");
    const [error, setError] = useState("");

    async function add() {
        console.log(image);
        setError("");
        //let item = { name, email, address, phone, image, type, password, rpass };
        const formData = new FormData();
        formData.append('name', name);
        formData.append('condition', condition);
        formData.append('price', price);
        formData.append('category', category);
        formData.append('discount', discount);
        formData.append('quantity', quantity);
        formData.append('description', description);
        formData.append('image', image);

        if (name == "" || condition == "" || price == "" || category == "" || discount == "" || quantity == "" || description == "" || image == "") {
            setError("Please fill up all the fields");
        }
        else {
            console.log("am");
            let result = await fetch(`http://127.0.0.1:8000/api/seller/addProduct/${user[0].id}`, {
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
            history.push(`/seller/showProduct`);
        }
    }

    return (
        <div>
            <h1 style={{ textAlign: 'center' }}>Add Product</h1>
            <br></br>
            <div align="center">
                <fieldset>
                    <table>
                        <tr>
                            <td>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Name"
                                    className="form-control"
                                    onChange={(e) => setName(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="price"
                                    id="price"
                                    placeholder="Price"
                                    className="form-control"
                                    onChange={(e) => setPrice(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="condition"
                                    id="condition"
                                    placeholder="Condition"
                                    className="form-control"
                                    onChange={(e) => setCondition(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="category"
                                    id="category"
                                    placeholder="Category"
                                    className="form-control"
                                    onChange={(e) => setCategory(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="quantity"
                                    id="quantity"
                                    placeholder="Quantity"
                                    className="form-control"
                                    onChange={(e) => setQuantity(e.target.value)} />
                            </td>
                        </tr>

                        <tr>
                            <td>Picture:
                                <input type="file"
                                    name="image"
                                    className="form-control"
                                    onChange={(e) => setImage(e.target.files[0])} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="discount"
                                    id="discount"
                                    placeholder="Discount"
                                    className="form-control"
                                    onChange={(e) => setDiscount(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text"
                                name="description"
                                id="description"
                                placeholder="Description"
                                className="form-control"
                                onChange={(e) => setDescription(e.target.value)} />
                            </td>
                        </tr>
                        <br></br>
                        <br></br>
                        <tr>
                            <td><Button variant="outline-success" onClick={add}>Add Product</Button>
                            </td>
                            <Back></Back>
                        </tr>
                    </table>
                    {error}
                </fieldset>
            </div>
        </div >
    );
};

export default AddUser;