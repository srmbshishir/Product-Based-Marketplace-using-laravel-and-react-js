
import './App.css';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Navbar from './components/navbar';
import Login from './components/login';

import Admin from './components/admin';
import Buyer from './components/buyer';
import Seller from './components/seller';
import Store from './components/StoreUser';

function App() {
  return (
    <Router>
      <Navbar/>
        <Store>
            <Switch>
                <Route exact path='/'> 
                    <h1>Welcome Home!</h1>
                </Route>    
                <Route exact path='/login'> 
                    <Login></Login>
                </Route>    
                <Route exact path='/admin/index/:id'> 
                    <Admin></Admin>
                </Route> 
                <Route exact path='/buyer/index'> 
                    <Buyer></Buyer>
                </Route> 
                <Route exact path='/seller/index'> 
                    <Seller></Seller>
                </Route> 
            </Switch>
        </Store>
    </Router>
  );
}

export default App;
