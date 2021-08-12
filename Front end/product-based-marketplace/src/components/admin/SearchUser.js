import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';
import Back from './Back';
import { Link } from 'react-router-dom';

function SearchUser() {
    const [key, setKey] = useState("");
    const [userlist, setUserList] = useState([]);

    async function Search() {
        let result = await fetch(`http://127.0.0.1:8000/api/admin/showuser/search/` + key)
        result = await result.json();
        console.log(result);
        setUserList(result);
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
                            <td>
                                <Link to={`edit/${item.id}`}> EDIT</Link>
                            </td>
                        </tr>
                    )
                }
            </table>
        </div>
    );
};

export default SearchUser;