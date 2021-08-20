import React from 'react';
import Button from 'react-bootstrap/esm/Button';
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
        history.push(`/buyer/index/${user[0].id}`);
    }
    return (
        <div>
            <Button variant="outline-secondary" onClick={back}>Back</Button>
        </div>
    );
};

export default Back;