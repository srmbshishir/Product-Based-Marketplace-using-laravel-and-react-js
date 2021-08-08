import React, { useContext } from 'react';
import { useState} from "react";
import { useHistory } from "react-router";
import {Context} from './StoreUser';

function Login()
{
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState();
    const [emailerror, setEmailError] = useState();
    const [passerror, setPassError] = useState();
    
    const [state,setState]=useContext(Context);

    const history = useHistory();


    async function login(){
        setError("");
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
        })
        // .catch((e)=>{
        //     console.log(e.result);
        // })

        // if(!result.ok){
        //     console.log("ashsi");
        //     //throw Error('could not fetch the data for that resource')
            
        // }

            result = await result.json();
            localStorage.setItem("user-info",JSON.stringify(result));
            const person=localStorage.getItem('user-info')
            JSON.parse(person);
            console.log(person);

            //console.log(typeof(person));

            // if(person==="invalid"){
            //     setError("Username or password is invalid")
            //     console.log(error);
            // }


    
            var obj = JSON.parse(person);
            console.log(obj);


            if(obj.type==='admin'){
                history.push(`/admin/index/${obj.id}`);
                setState(obj);
            }
            else if(obj.type==='buyer'){
                history.push("/buyer/index")
            }
            else if(obj.type==='seller'){
                history.push("/seller/index")
            }
            else if(obj==="invalid username or password"){
                setError(obj);
            }
            else if(obj==="you have been blocked"){
                setError(obj);
            }
            else{
                let error1=obj.errors  
                //console.log(error1.stringify);
                setEmailError(error1.email);
                setPassError(error1.password);


            }
    }
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
                <br/>

                {/* {this.error.map((e)=>{
                    return e;
                })} */}
                {emailerror}
                <br/>
                {passerror}
                <br/>
                {error}
            </div>
        </div>
    );
};


export default Login;