import { Link } from "react-router-dom"
import { useParams } from "react-router";
import './bootstrap/bootstrap.min.css';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import Container from 'react-bootstrap/Container';

const BuyerNavbar = () => {
    const { id: eid } = useParams();

    const mystyle = {
        textDecoration: "none",
    }


    return (
        <div>
            <Navbar bg="dark" variant="dark">
                <Container>
                    <Navbar.Brand href="" style={{ color: "goldenrod" }}>Menu</Navbar.Brand>
                    <Nav className="me-auto">
                        <Nav.Link><Link style={mystyle} to="/buyer/AllProducts">Show Products</Link></Nav.Link>
                        <Nav.Link><Link style={mystyle} to="/buyer/showorder">Show Order</Link> </Nav.Link>
                        <Nav.Link><Link style={mystyle} to={`/buyer/myprofile/${eid}`}>My Profile</Link></Nav.Link>
                        <Nav.Link><Link style={mystyle} to="/buyer/dashboard">Dashbaord</Link> </Nav.Link>
                    </Nav>
                </Container>
            </Navbar>


        </div>
    );
}

export default BuyerNavbar;