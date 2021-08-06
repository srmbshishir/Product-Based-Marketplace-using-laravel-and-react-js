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
        //$result = DB::table('user')
        //->where('email', $req->email)
        //->where('password', $req->password)
        //->first();

        //echo $result;
       // print_r($result[0]);
        if(DB::table('user')->where('email',$req->email)->where('password', $req->password)->where('status','!=','blocked')->exists()){
        //if(count(array($result)) > 0){
                $user = Person::find($req->email);
                $req->session()->put('name', $user['name']);
                $req->session()->put('type', $user['type']);
                $req->session()->put('id', $user['id']);
                $req->session()->put('email', $user['email']);
                $req->session()->put('address', $user['address']);
                $req->session()->put('phone', $user['phone']);
                $req->session()->put('password', $user['password']);
                $req->session()->put('image', $user['image']);

                //$req->session()->put('name', $result->name);
                //$req->session()->put('type', $result->type);
                
                if($user['type']=='admin'){
                    return redirect('/admin/index');
                }
                if($user['type']=='buyer'){
                    return redirect('/buyer/'.$user['id'].'/index');
                }
                if($user['type']=='seller'){
                    return redirect('/seller/index');
                }   
        }
        else if(DB::table('user')->where('email',$req->email)->where('password', $req->password)->where('status','blocked')->exists()){
            $req->session()->flash('msg', 'Account Blocked!');
            return redirect('/login');
        }
        else{
            $req->session()->flash('msg', 'Invalid username or password!');
            return redirect('/login');
        }
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
