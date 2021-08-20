import React, { useContext } from 'react';
import { Context } from '../StoreUser';
import { useHistory } from "react-router";
import auth from '../auth';
import Button from 'react-bootstrap/Button';
import BuyerNavbar from './BuyerNavbar';



const Buyer = () => {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;
    const [typeValue,setTypeValue]=type;
    const history = useHistory();

    function logout() {
        console.log("ashso");
        auth.logout(() => {
            console.log("ashso");
            history.push("/login");
        });
    }

    return (
        <div>
            <BuyerNavbar></BuyerNavbar>
            <h1>Index Page</h1>

            <h1>User type : {userValue.type}</h1>
            <h1>User name : {userValue.name}</h1>
            <Button variant="outline-danger" onClick={logout}>Logout</Button>

            {/* <h1>{typeValue}</h1> */}
        </div>
    );
};

export default Buyer;