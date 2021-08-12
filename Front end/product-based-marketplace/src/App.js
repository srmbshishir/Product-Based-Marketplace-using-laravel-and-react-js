import './App.css';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Navbar from './components/navbar';
import Login from './components/login';

import Admin from './components/admin';
import AddUser from './components/admin/AddUser';
import approveProducts from './components/admin/ApproveProducts';
import Dashboard from './components/admin/Dashboard';
import myProfile from './components/admin/MyProfile';
import ShowUser from './components/admin/ShowUser';
import Edit from './components/admin/Edit';

import Buyer from './components/buyer';
import Seller from './components/seller';
import Store from './components/StoreUser';
import { ProtectedRoute } from './components/ProtectedRoute';

import React, { useContext } from 'react';
import { Context } from './components/StoreUser';
import SearchUser from './components/admin/SearchUser';

function App() {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

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
                    <ProtectedRoute exact path='/admin/adduser' component={AddUser} />
                    <ProtectedRoute exact path='/admin/showuser' component={ShowUser} />
                    <ProtectedRoute exact path='/admin/approveproducts' component={approveProducts} />
                    <ProtectedRoute exact path='/admin/myprofile/:id' component={myProfile} />
                    <ProtectedRoute exact path='/admin/dashboard' component={Dashboard} />
                    <ProtectedRoute exact path='/admin/edit/:id' component={Edit} />
                    <ProtectedRoute exact path='/admin/search' component={SearchUser} />



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