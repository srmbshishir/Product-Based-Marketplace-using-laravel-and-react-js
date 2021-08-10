import { Link } from "react-router-dom"


const AdminNavbar = () => {


    return (
        <div>
            <Link to="/admin/adduser">Add User</Link> |
            <Link to="/admin/approveproducts">Approve Products</Link> |
            <Link to="/admin/showuser">Show User</Link> |
            <Link to="/admin/myprofile">My Profile</Link> |
            <Link to="/admin/dashboard">Dashbaord</Link> |

        </div>
    );
}

export default AdminNavbar;