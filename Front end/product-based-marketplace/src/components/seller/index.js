import React, { useContext } from 'react';
import { Context } from '../StoreUser';
import { useHistory } from "react-router";


const Seller = () => {
    const {user,type}= React.useContext(Context);
    const [userValue,setUserValue]=user;
    const history = useHistory();
    //const [typeValue,setTypeValue]=type;

    return (
        <div>
            <h1>Index Page</h1>
            <h1>User type : {userValue.type}</h1>
            <h1>User name : {userValue.name}</h1>

            {/* <h1>{typeValue}</h1> */}
        </div>
    );
};

export default Seller;