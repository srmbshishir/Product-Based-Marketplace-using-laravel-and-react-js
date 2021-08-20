import './App.css';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import HomeNavbar from './components/navbar';
import Login from './components/login';
import Register from './components/Register/Register';

import Admin from './components/admin';
import AddUser from './components/admin/AddUser';
import approveProducts from './components/admin/ApproveProducts';
import Dashboard from './components/admin/Dashboard';
import myProfile from './components/admin/MyProfile';
import ShowUser from './components/admin/ShowUser';
import Edit from './components/admin/Edit';

import Buyer from './components/buyer';
//import BuyerProfile from './components/buyer/BuyerProfile';
import BuyerDashboard from './components/buyer/BuyerDashboard';
import Product from './components/buyer/ShowProduct';
import Seller from './components/seller';
import Store from './components/StoreUser';
import { ProtectedRoute } from './components/ProtectedRoute';

import React, { useContext } from 'react';
import { Context } from './components/StoreUser';
import SearchUser from './components/admin/SearchUser';
import AddProduct from './components/seller/AddProduct';
import ShowProduct from './components/seller/ShowProduct';
import EditSeller from './components/seller/Edit';
import Delete from './components/seller/Delete';
import ShowOrder from './components/seller/ShowOrder';
import MyProfile from './components/admin/MyProfile';
import SellerProfile from './components/seller/SellerProfile';
import SellerDashboard from './components/seller/SellerDashboard';
import registration from './components/registration';
import Registration from './components/registration';
import Home from './components/Home';

function App() {
    const { user, type } = React.useContext(Context);
    const [userValue, setUserValue] = user;

    return (
        <Router>
            <Store>
                <Switch>

                    <Route exact path='/'>
                        <HomeNavbar></HomeNavbar>
                        <h1>Welcome!</h1>
                        <Home></Home>
                    </Route>
                    <Route exact path='/login'>
                        <Login></Login>
                    </Route>
                    <Route exact path='/registration'>
                        <Registration></Registration>
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
                    {/* <ProtectedRoute exact path='/buyer/myprofile/:id' component={BuyerProfile} />*/}
                    <ProtectedRoute exact path='/buyer/dashboard' component={BuyerDashboard} />
                    <ProtectedRoute exact path='/buyer/showProduct' component={Product} />
                    {/* <Route exact path='/buyer/index/:id'> 
                    <Buyer></Buyer>
                </Route>  */}
                    <ProtectedRoute exact path='/seller/index/:id' component={Seller} />
                    <ProtectedRoute exact path='/seller/addproduct' component={AddProduct} />
                    <ProtectedRoute exact path='/seller/showproduct' component={ShowProduct} />
                    <ProtectedRoute exact path='/seller/edit/:id' component={EditSeller} />
                    <ProtectedRoute exact path='/seller/delete/:id' component={Delete} />
                    <ProtectedRoute exact path='/seller/showorder' component={ShowOrder} />
                    <ProtectedRoute exact path='/seller/myprofile/:id' component={SellerProfile} />
                    <ProtectedRoute exact path='/seller/dashboard' component={SellerDashboard} />

                    {/* <Route exact path='/seller/index/:id'> 
                    <Seller></Seller>
                </Route>  */}

                </Switch>
            </Store>
        </Router>
    );
}

export default App;