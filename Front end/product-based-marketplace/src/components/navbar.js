import { Link } from "react-router-dom"
import './admin/bootstrap/bootstrap.min.css';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import Container from 'react-bootstrap/Container';


const HomeNavbar = () => {

    return (
        <div>
            <Navbar bg="dark" variant="dark">
                <Container>
                    <Navbar.Brand href="" style={{ color: "goldenrod" }}>Menu</Navbar.Brand>
                    <Nav className="me-auto">
                        <Nav.Link><Link to="/">Home</Link></Nav.Link>
                        <Nav.Link><Link to="/login">Login</Link></Nav.Link>

                    </Nav>
                </Container>
            </Navbar>
        </div>
    );
}

export default HomeNavbar;