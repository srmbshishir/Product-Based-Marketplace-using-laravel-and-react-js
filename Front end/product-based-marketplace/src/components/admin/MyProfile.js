import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import { useParams } from "react-router";
import Back from './Back';
import validator from 'validator';

const MyProfile = () => {
    const [name, setName] = useState("");
    const [email, setEmail] = useState("");
    const [address, setAdress] = useState("");
    const [phone, setPhone] = useState("");
    const [password, setPassword] = useState("");
    const [rpass, setrpass] = useState("");

    const [error, setError] = useState();

    const { id: eid } = useParams();

    const url = `http://127.0.0.1:8000/api/admin/${eid}/edit`;
    const [userlist, setUserList] = useState([]);
    useFetch(url, setUserList);

    async function update() {
        console.log(name, email, address, phone, password);

        // setType(userlist.type);
        setError("");
        //let item = { name, email, address, phone, image, type, password, rpass };
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('address', address);
        formData.append('phone', phone);
        formData.append('password', password);

        if (name == "" || email == "" || address == "" || phone == "" || password == "" || rpass == "") {
            setError("Please fill up all the fields");
        }
        else if (password != rpass) {
            setError("Password does not match");
        }
        else if (password.length < 10 || rpass.length < 10) {
            setError("Password should be at least 10 characters");
        }
        else if (!validator.isEmail(email)) {
            setError("enter a valid email");
        }
        else {
            console.log('bosos');
            let result = await fetch(`http://127.0.0.1:8000/api/admin/profile/${eid}`, {
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
            <h1>My Profile</h1>
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
                            <td><button onClick={update}>Update</button></td>
                            <Back></Back>
                        </tr>
                    </table>
                    {error}
                </fieldset>
            </div>
        </div>
    );
};

export default MyProfile;