import React from 'react';
import { useHistory } from "react-router";
import { useParams } from "react-router";
import { Context } from '../StoreUser';

const Back = () => {
    const history = useHistory();
    const { id: eid } = useParams();

    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    function back() {
        // console.log(user[0].id);
        history.push(`/admin/index/${user[0].id}`);
    }
    return (
        <div>
            <button onClick={back}>Back</button>
        </div>
    );
};

export default Back;