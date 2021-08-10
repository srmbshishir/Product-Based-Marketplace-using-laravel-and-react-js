import React from 'react';
import { useFetch } from '../UseFetch';
import { useState } from 'react';

const ShowUser = () => {
    const url = `http://127.0.0.1:8000/api/admin/showUser`;

    const [userlist, setUserList] = useState([]);
    useFetch(url, setUserList);
    console.log(userlist);
    // JSON.parse(userlist);
    // console.log(userlist);

    return (
        <div>
            <h1>Show User Page</h1>
            <table>
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
                        </tr>
                    )
                }
            </table>
        </div>
    );
};

export default ShowUser;