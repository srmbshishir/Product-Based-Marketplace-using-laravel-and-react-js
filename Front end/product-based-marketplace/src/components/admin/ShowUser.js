import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import { Link } from 'react-router-dom';

const ShowUser = () => {
    const url = `http://127.0.0.1:8000/api/admin/showUser`;
    const [userlist, setUserList] = useState([]);
    useFetch(url, setUserList);
    console.log(userlist);

    //search work
    const [key, setKey] = useState("");
    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/admin/showuser/search/` + key)
        result = await result.json();
        console.log(result);
        setUserList(result);
    }

    //show all
    async function ShowAll() {
        let result = await fetch(`http://127.0.0.1:8000/api/admin/showUser`)
        result = await result.json();
        setUserList(result);
    }

    const mystyle = {
        width: 100,
        height: 100,
        // CSS CODE
    };

    //status change
    const [status, setStatus] = useState("");

    async function Approve(id) {
        const formData = new FormData();
        formData.append('status', status);
        // console.log(id);
        // console.log(status);
        let result = await fetch(`http://127.0.0.1:8000/api/admin/userstatus/${id}`, {
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
            <Back></Back>
            <input type="text"
                placeholder="Type user id/type"
                name="search"
                onChange={(e) => setKey(e.target.value)}
            />
            <button onClick={Search}>Search</button>
            <button onClick={ShowAll}>Show All</button>
            <h1>Show User Page</h1>
            <table style={{ "border": "1px solid" }} >
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Type</td>
                    <td>Image</td>
                    <td>Contact</td>
                    <td>Address</td>
                    <td>Image</td>
                </tr>
                {
                    userlist.map((item) =>
                        <tr>
                            <td>{item.id}</td>
                            <td>{item.name}</td>
                            <td>{item.email}</td>
                            <td>{item.type}</td>
                            <td>{item.image}</td>
                            <td>{item.phone}</td>
                            <td>{item.address}</td>
                            <td><img src={`../upload/${item.image}`} style={mystyle}></img></td>

                            <td>
                                <Link to={`edit/${item.id}`}> EDIT</Link>
                            </td>
                            <td>
                                <label for="status">Update Status:</label>

                                <select name="status"
                                    id="status"
                                    value={item.status}
                                    onChange={(e) => setStatus(e.target.value)}>
                                    <option value="active">Active</option>
                                    <option value="blocked">Blocked</option>
                                </select>
                                <button onClick={() => Approve(item.id)}>Change Status</button>
                            </td>
                        </tr>
                    )
                }
            </table>
        </div >
    );
};

export default ShowUser;