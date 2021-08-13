import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import { useParams } from "react-router";
import Back from './Back';
import validator from 'validator';
import Button from 'react-bootstrap/esm/Button';

const Edit = () => {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [address, setAdress] = useState("");
    const [phone, setPhone] = useState("");
    const [type, setType] = useState("");
    const [error, setError] = useState();

    const { id: eid } = useParams();
    console.log(eid);
    const url = `http://127.0.0.1:8000/api/admin/${eid}/edit`;

    const [userlist, setUserList] = useState([]);
    useFetch(url, setUserList);

    async function update() {
        console.log(name, email, address, phone, type);

        // setType(userlist.type);
        setError("");
        //let item = { name, email, address, phone, image, type, password, rpass };
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('phone', phone);
        formData.append('type', type);

        if (name == "" || email == "" || address == "" || phone == "" || type == "") {
            setError("Please fill up all the fields");
            console.log("ashsi");
        }
        else if (!validator.isEmail(email)) {
            setError("enter a valid email");
            console.log("ashsi");
        }
        else {
            console.log("ashsi");
            console.log("am");
            let result = await fetch(`http://127.0.0.1:8000/api/admin/${eid}/edit`, {
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
                                    placeholder={userlist.name}
                                    onChange={(e) => setName(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email"
                                    name="email"
                                    id="email"
                                    placeholder={userlist.email}
                                    onChange={(e) => setEmail(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text"
                                    name="address"
                                    id="address"
                                    placeholder={userlist.address}
                                    onChange={(e) => setAdress(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="phone"
                                    name="phone"
                                    id="phone"
                                    placeholder={userlist.phone}
                                    onChange={(e) => setPhone(e.target.value)} />
                            </td>
                        </tr>
                        <tr>
                            <td>User Type:
                                <select name="type"
                                    value={userlist.type}
                                    onChange={(e) => setType(e.target.value)}>
                                    <option value="admin">Admin</option>
                                    <option value="seller">Seller</option>
                                    <option value="buyer">Buyer</option>
                                </select>
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

export default Edit;