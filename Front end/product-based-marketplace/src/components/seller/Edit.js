import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import { useParams } from "react-router";
import Back from './Back';
import Button from 'react-bootstrap/esm/Button';

const EditSeller = () => {
    const [name, setName] = useState("");
    const [condition, setCondition] = useState("");
    const [price, setPrice] = useState("");
    const [category, setCategory] = useState("");
    const [discount, setDiscount] = useState("");
    const [quantity, setQuantity] = useState("");
    const [description, setDescription] = useState("");
    const [image, setImage] = useState("");
    const [error, setError] = useState("");

    const { id: eid } = useParams();
    console.log(eid);
    const url = `http://127.0.0.1:8000/api/product/edit/${eid}`;

    const [productlist, setProductList] = useState([]);
    useFetch(url, setProductList);

    async function update() {
        setError("");
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
            console.log("ashsi");
            console.log("am");
            let result = await fetch(`http://127.0.0.1:8000/api/product/edit/${eid}`, {
                method: 'POST',
                body: formData
            });

            result = await result.json();
            localStorage.setItem("user-info", JSON.stringify(result));
            const message = localStorage.getItem('user-info')
            JSON.parse(message);
            alert(message);
        }
    }



    return (
        <div>
            <h1>Edit</h1>
            <div align="center">
                <fieldset>
                    <table>
                        <tr>
                            <td>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    placeholder={productlist.name}
                                    className="form-control"
                                    onChange={(e) => setName(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="price"
                                    id="price"
                                    placeholder={productlist.price}
                                    className="form-control"
                                    onChange={(e) => setPrice(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="condition"
                                    id="condition"
                                    placeholder={productlist.p_condition}
                                    className="form-control"
                                    onChange={(e) => setCondition(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="category"
                                    id="category"
                                    placeholder={productlist.category}
                                    className="form-control"
                                    onChange={(e) => setCategory(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="quantity"
                                    id="quantity"
                                    placeholder={productlist.quantity}
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
                                    placeholder={productlist.discount}
                                    className="form-control"
                                    onChange={(e) => setDiscount(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text"
                                name="description"
                                id="description"
                                placeholder={productlist.description}
                                className="form-control"
                                onChange={(e) => setDescription(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td><Button onClick={update}>Update</Button></td>
                            <Back></Back>
                        </tr>
                    </table>
                    {error}
                </fieldset>
            </div>
        </div>
    );
};

export default EditSeller;