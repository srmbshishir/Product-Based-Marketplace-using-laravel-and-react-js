import React from 'react';
import { useState } from "react";

function AddUser() {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [address, setAdress] = useState("");
    const [phone, setPhone] = useState("");
    const [image, setImage] = useState("");
    const [type, setType] = useState("");
    const [password, setPassword] = useState("");
    const [rpass, setrpass] = useState("");
    const [error, setError] = useState();


    async function add() {
        console.log(image);
        setError("");
        //let item = { name, email, address, phone, image, type, password, rpass };
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('phone', phone);
        formData.append('image', image);
        formData.append('type', type);
        formData.append('password', password);
        formData.append('rpass', rpass);
        let result = await fetch("http://127.0.0.1:8000/api/admin/addUser", {
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
            <h1>Add User</h1>
            <div align="center">
                <fieldset>
                    <table>
                        <tr>
                            <td>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Name"
                                    onChange={(e) => setName(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Email"
                                    onChange={(e) => setEmail(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="address"
                                    id="address"
                                    placeholder="Address"
                                    onChange={(e) => setAdress(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="phone"
                                    name="phone"
                                    id="phone"
                                    placeholder="Contact Number"
                                    onChange={(e) => setPhone(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>User Type:
                                <select name="type"
                                    onChange={(e) => setType(e.target.value)}>
                                    <option value="admin">Admin</option>
                                    <option value="seller">Seller</option>
                                    <option value="buyer">Buyer</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Picture:
                                <input type="file"
                                    name="image"
                                    onChange={(e) => setImage(e.target.files[0])} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password"
                                    name="password"
                                    id="pass"
                                    placeholder="Password"
                                    onChange={(e) => setPassword(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td><input type="password"
                                name="rpass"
                                id="rpass"
                                placeholder="Re-type Password"
                                onChange={(e) => setrpass(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td><button onClick={add}>Login</button></td>
                        </tr>
                    </table>
                </fieldset>
            </div>
        </div>
    );
};

export default AddUser;