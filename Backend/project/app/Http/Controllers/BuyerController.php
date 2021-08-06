<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\ProRequest;

class BuyerController extends Controller
{
    public function buyerProfile($id){
        // return view('Seller.profile');
         $user = User::find($id);
         return view('Buyer.profile')->with('user', $user);
    }
    public function editProfile(ProRequest $req, $id)
    {
        $user= User::find($id);
        $user->name = $req->name;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password =$req->password;

        $user->save();
        return view('Buyer.profile')->with('user',$user);
    }
    public function edit($id){
        $user = User::find($id);
        return view('Buyer.edit')->with('user',$user);
    }
    public function buyerimage(Request $req,$id){
        $user= User::find($id);
        if($req->hasFile('image')){
            $file = $req->file('image');
            // echo "file name: ".$file->getClientOriginalName()."<br>";
            // echo "file extension: ".$file->getClientOriginalExtension()."<br>";
            // echo "file Mime Type: ".$file->getType()."<br>";
            // echo "file Size: ".$file->getSize();
            $user->image = $file->getClientOriginalName();
            $user->save();

            if($file->move('upload', $file->getClientOriginalName())){
                echo "success";
            }else{
                echo "error..";
            }

        }else{
            echo "file not found!";
        }
        return view('Buyer.profile')->with('user',$user);
    }
    
}
