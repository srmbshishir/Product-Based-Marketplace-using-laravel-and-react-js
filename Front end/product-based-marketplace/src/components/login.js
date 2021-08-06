import React from 'react';
import { useState} from "react";
import { useHistory } from "react-router";

function Login()
{
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const history = useHistory();


    async function login(){
        console.warn(email,password);
        //console.log(errors);
        let item={email,password};
        let result = await fetch("http://127.0.0.1:8000/api/login",{
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "Accept": 'application/json'
            },
            body: JSON.stringify(item)
        });
        result = await result.json();
        localStorage.setItem("user-info",JSON.stringify(result));
        const person=localStorage.getItem('user-info')
        JSON.parse(person);

        var obj = JSON.parse(person);
        if(obj.type==='admin'){
            history.push("/admin/index")
        }
        else if(obj.type==='buyer'){
            history.push("/buyer/index")
        }
        else if(obj.type==='seller'){
            history.push("/seller/index")
        }
    }
    
    // const onsubmit = (e)=>{
    //     // e.preventDefault();
    //     // console.log(user);
    //     // addNewUser(user);
    //     // history.push('/userlist');
    //     console.log(user);
    // }
    return (
        <div>
            <h1>Login page</h1>
            <div className="col-sm-6 offset-sm-3">
                <input 
                type="text" 
                placeholder="Type User Email"
                onChange={(e)=>setEmail(e.target.value)}
                className="form-control"/>
                <br/>
                <input 
                type="password" 
                placeholder="Type Password"
                onChange={(e)=>setPassword(e.target.value)}
                className="form-control"/>
                <br/>
                <button onClick={login}>Login</button>


            </div>
        </div>
    );
};


export default Login;