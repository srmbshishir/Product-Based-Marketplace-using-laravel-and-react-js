<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function add()
    {
        return view('Seller.add');
    }

    public function insert(ProductRequest $req){
        $product = new Product;

        //$product->id                = DB::table('products')->increment('id');
        $count = Product::orderBy('id',"desc")->first();

        if($count){
            $id = intval(substr($count->id,2,8))+1;
            $id = "PR".strval($id);
        }   
        else{
            $id = "PR1000";
        }

        $product->id                = $id;
        $product->name              = $req->name; 
        $product->price             = $req->price; 
        $product->p_condition       = $req->condition; 
        $product->category          = $req->category; 
        $product->userid            = session('id');
        $product->quantity          = $req->quantity;
        $product->discount          = $req->discount;
        $product->description       = $req->description;
        $product->status            = 'pending';         

        

        if($req->hasFile('image')){
            $file = $req->file('image');
            // echo "file name: ".$file->getClientOriginalName()."<br>";
            // echo "file extension: ".$file->getClientOriginalExtension()."<br>";
            // echo "file Mime Type: ".$file->getType()."<br>";
            // echo "file Size: ".$file->getSize();
            $product->image = $file->getClientOriginalName();
            $product->save();

            if($file->move('upload', $file->getClientOriginalName())){
                echo "success";
            }else{
                echo "error..";
            }

        }else{
            echo "file not found!";
        }

        return redirect()->route('show');
    }

    public function show(Request $req){

        //$products= DB::table('product')
          //          ->where('userid' ,'like', '%' . session('id') . '%');
        //select("SELECT * FROM `product` WHERE userid='".session('id')."'");

        //$products->paginate(3);
        //return view('Seller.show')->with('userlist', $products);

        $product =new Product();
        $products = $product->where('userid',session('id'))->paginate(3);
        //return view('product.existing')->with('list',$list);
        return view('Seller.show')->with('userlist', $products);
      
        //$products= DB::select("SELECT * FROM `product` WHERE userid='".session('id')."'");
        
       /*
        $data = DB::table('holes');
       $products->paginate(3);
       return view('Product.userlist');
        ...
        and then just filter and return it in the if/else statement call
       return $data->where('city' ,'like', '%' . $city . '%');
        ...
        $products = Product::where('userid', session('id'));
        $data->where('city' ,'like', '%' . $city . '%');
        or append to the $data
        $data = $data->where('city' ,'like', '%' . $city . '%');
  */
    }

    public function edit($name)
    {
        $product = Product::find($name);
        return view('Seller.edit')->with('product', $product);
    }
    

    public function update(ProductRequest $req, $name)
    {
        $product= Product::find($name);
        $product->name = $req->name;
        $product->price = $req->price;
        $product->p_condition = $req->condition;
        $product->category = $req->category;
        $product->quantity = $req->quantity;
        $product->discount = $req->discount;
        $product->description = $req->description;

        //dd($req->all());
        
        if($req->has('image')){
            $file = $req->file('image');
            $product->image = $file->getClientOriginalName();
            

            if($file->move('upload', $file->getClientOriginalName())){
                echo "success";
                $product->save();
                return redirect()->route('show');
                
                
            }else{
                echo "error..";
            }
        }
    }
    public function delete($name)
    {
        $product = Product::find($name);
        $product->delete();
        return redirect()->route('show');
    }
    public function search(Request $req)
    {
        $product =new Product();
        $products = $product->where('id','like','%'.$req->search.'%')->where('userid',session('id'))->orwhere('category','like','%'.$req->search.'%')->where('userid',session('id'))->paginate(3);
        //SELECT * FROM `product` WHERE id like 'elec%' or category like 'elec%'
        //dd($req->all());
        return view('Seller.show')->with('userlist', $products);
    }
    public function approve(){
        $product =new Product();
        $products = $product->orderBy('id','desc')->paginate(5);
        //return view('product.existing')->with('list',$list);
        return view('Admin.approve')->with('userlist', $products);
    }
    public function status(Request $req, $id)
    {
        $product= Product::find($id);
        //print_r($order);
        $product->status = $req->status;
        //print_r($order->track);

        $product->save();
        //dd($req->all());
        return redirect('/admin/ApproveProduct');
    }
    public function adminsearch(Request $req)
    {
        $product =new Product();
        $products = $product->where('id','like','%'.$req->search.'%')->orwhere('category','like','%'.$req->search.'%')->paginate(3);
        //SELECT * FROM `product` WHERE id like 'elec%' or category like 'elec%'
        //dd($req->all());
        return view('Admin.approve')->with('userlist', $products);
    }
    public function welcomesearch(Request $req)
    {
        $product =new Product();
        $products = $product->where('name','like','%'.$req->search.'%')->where('status','accepted')->orwhere('category','like','%'.$req->search.'%')->where('status','accepted')->paginate(6);
        //SELECT * FROM `product` WHERE id like 'elec%' or category like 'elec%'
        //dd($req->all());
        return view('welcome',['product'=> $products]);
    }
    public function welcomeshow(Request $req){

        $product =new Product();
        $products = $product->where('status','accepted')->paginate(8);

        return view('welcome',['product'=> $products]);
      
    }
}