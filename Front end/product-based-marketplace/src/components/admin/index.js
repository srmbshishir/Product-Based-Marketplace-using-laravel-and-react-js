import React, { useContext } from 'react';
import { Context } from '../StoreUser';
import { useHistory } from "react-router";
import auth from '../auth';



const Admin = () => {
    const {user,type}= React.useContext(Context);
    const [userValue,setUserValue]=user;
    //const [typeValue,setTypeValue]=type;
    const history = useHistory();

    function logout(){
        console.log("ashso");
        auth.logout(() => {
            console.log("ashso");
            history.push("/login");
        });
    }

    return (
        <div>
            <h1>Index Page</h1>
            <h1>User type : {userValue.type}</h1>
            <h1>User name : {userValue.name}</h1>
            <button onClick={logout}>Logout</button>

            {/* <h1>{typeValue}</h1> */}
        </div>
    );
};

export default Admin;