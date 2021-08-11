import { Link } from "react-router-dom"
import { useParams } from "react-router";


const AdminNavbar = () => {
    const { id: eid } = useParams();


    return (
        <div>
            <Link to="/admin/adduser">Add User</Link> |
            <Link to="/admin/approveproducts">Approve Products</Link> |
            <Link to="/admin/showuser">Show User</Link> |
            <Link to={`/admin/myprofile/${eid}`}>My Profile</Link>|
            <Link to="/admin/dashboard">Dashbaord</Link> |

        </div>
    );
}

export default AdminNavbar;