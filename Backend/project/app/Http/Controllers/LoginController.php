<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use validator;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class LoginController extends Controller
{
    public function index(){
        return view('Login.login');
    }

    public function verify(LoginRequest $req){
        if(DB::table('user')->where('email',$req->email)->where('password', $req->password)->where('status','!=','blocked')->exists()){
                $user = Person::find($req->email);
                return $user;
                // $req->session()->put('name', $user['name']);
                // $req->session()->put('type', $user['type']);
                // $req->session()->put('id', $user['id']);
                // $req->session()->put('email', $user['email']);
                // $req->session()->put('address', $user['address']);
                // $req->session()->put('phone', $user['phone']);
                // $req->session()->put('password', $user['password']);
                // $req->session()->put('image', $user['image']);
                
                // if($user['type']=='admin'){
                //     //return redirect('/admin/index');
                //     return "admin";
                // }
                // if($user['type']=='buyer'){
                //     //return redirect('/buyer/'.$user['id'].'/index');
                //     return "buyer";
                // }
                // if($user['type']=='seller'){
                //     //return redirect('/seller/index');
                //     return "seller";
                // }   
        }
        else if(DB::table('user')->where('email',$req->email)->where('password', $req->password)->where('status','blocked')->exists()){
            //$req->session()->flash('msg', 'Account Blocked!');
            //return redirect('/login');
            //return $errors;
            
            return json_encode("you have been blocked");
            
        }
        else{
            //$req->session()->flash('msg', 'Invalid username or password!');
            //return redirect('/login');
            //return $errors;
            return json_encode("invalid username or password");
        }
        return json_encode($errors);
    }


    public function admin(){
        return view('Admin.index');
    }
    public function buyer($userId){
        $product = DB::table('product')->get();
        return view('Buyer.index',['product'=> $product, 'userId'=>$userId]);
    }
    public function seller(){
        return view('Seller.index');
    }
}
