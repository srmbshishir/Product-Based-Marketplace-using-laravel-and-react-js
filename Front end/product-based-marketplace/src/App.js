import './App.css';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Navbar from './components/navbar';
import Login from './components/login';

import Admin from './components/admin';
import Buyer from './components/buyer';
import Seller from './components/seller';
import Store from './components/StoreUser';
import { ProtectedRoute } from './components/ProtectedRoute';

import React, { useContext } from 'react';
import { Context } from './components/StoreUser';

function App() {
    const {user,type}= React.useContext(Context);
    const [userValue,setUserValue]=user;

  return (
    <Router>
        <Store>
            <Switch>
                <Route exact path='/'> 
                    <Navbar></Navbar>
                    <h1>Welcome Home!</h1>
                </Route>    
                <Route exact path='/login'> 
                    <Login></Login>
                </Route>
                <ProtectedRoute exact path='/admin/index/:id' component={Admin} />   
                {/* <Route exact path='/admin/index/:id'> 
                    <Admin></Admin>
                </Route>  */}
                <ProtectedRoute exact path='/buyer/index/:id' component={Buyer} />
                {/* <Route exact path='/buyer/index/:id'> 
                    <Buyer></Buyer>
                </Route>  */}
                <ProtectedRoute exact path='/seller/index/:id' component={Seller} />
                {/* <Route exact path='/seller/index/:id'> 
                    <Seller></Seller>
                </Route>  */}
            </Switch>
        </Store>
    </Router>
  );
}

export default App;