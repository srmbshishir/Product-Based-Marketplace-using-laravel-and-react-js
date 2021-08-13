import { Link } from "react-router-dom"
import { useParams } from "react-router";
import './bootstrap/bootstrap.min.css';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import Container from 'react-bootstrap/Container';
import './navbar.css';

const AdminNavbar = () => {
    const { id: eid } = useParams();


    return (
        <div>
            <Navbar bg="dark" variant="dark">
                <Container>
                    <Navbar.Brand href="" style={{ color: "goldenrod" }}>Menu</Navbar.Brand>
                    <Nav className="me-auto">
                        <Nav.Link><Link to="/admin/adduser">Add User</Link></Nav.Link>
                        <Nav.Link><Link to="/admin/approveproducts">Approve Products</Link></Nav.Link>
                        <Nav.Link><Link to="/admin/showuser">Show User</Link> </Nav.Link>
                        <Nav.Link><Link to={`/admin/myprofile/${eid}`}>My Profile</Link></Nav.Link>
                        <Nav.Link><Link to="/admin/dashboard">Dashbaord</Link> </Nav.Link>
                    </Nav>
                </Container>
            </Navbar>


        </div>
    );
}

export default AdminNavbar;