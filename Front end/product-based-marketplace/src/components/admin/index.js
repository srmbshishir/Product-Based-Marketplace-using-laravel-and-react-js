import React, { useContext } from 'react';
import { Context } from '../StoreUser';



const Admin = () => {
    const [state,setState]=useContext(Context)
    return (
        <div>
            <h1>Index Admin</h1>
            <h1>{state.name}</h1>
        </div>
    );
};

export default Admin;
