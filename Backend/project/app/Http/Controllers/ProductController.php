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

    public function insert(ProductRequest $req,$id){
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
        $product->userid            = $id;
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
                return json_encode("Product added");
            }else{
                return json_encode("error");
            }

        }else{
            return json_encode("file not found");
        }

        return json_encode("error");
    }

    public function show($id){
        $product =new Product();
        $products = $product->where('userid',$id)->get();
        return $products;
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return $product;
    }
    

    public function update(ProductRequest $req, $id)
    {
        $product= Product::find($id);
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
                $product->save();
                return json_encode("updated");
                
                
            }else{
                return json_encode("error");
            }
        }
        return json_encode("image not found");
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return json_encode("deleted");
    }
    public function search($id,$key)
    {
        $product =new Product();
        $products = $product->where('id','like','%'.$key.'%')->where('userid',$id)->orwhere('category','like','%'.$key.'%')->where('userid',$id)->get();
        //SELECT * FROM `product` WHERE id like 'elec%' or category like 'elec%'
        //dd($req->all());
        return $products;
    }
    public function approve(){
        $product =new Product();
        $products = $product->get();
        //return view('product.existing')->with('list',$list);
        return $products;
    }
    public function status(Request $req, $id)
    {
        $product= Product::find($id);
        //print_r($order);
        $product->status = $req->status;
        //print_r($order->track);

        $product->save();
        //dd($req->all());
        return json_encode("$id status updated to $product->status");
    }
    public function adminsearch($key)
    {
        return Product::where('id','like',"%$key%")->orwhere('category','like',"%$key%")->get();
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
        $products = $product->where('status','accepted')->get();

        return $products;
      
    }
}