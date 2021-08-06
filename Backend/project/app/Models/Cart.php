<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable=[
        'id',
        'user_id',
        'product_id'
    ];
    
    public function productDetails(){
        return $this->belongsTo('App\Models\Product','id','product_id');
    }
    
    public function userDetails(){
        return $this->belongsTo('App\Models\User','id','user_id');
    }
    public static function getCartFromUserID($user_id){
        return self::join('product','cart.product_id','product.id')
        ->where('user_id',$user_id)->get();
    }
    public static function addToCart($user_id, $products){
        self::insert([
            'user_id'=>$user_id,
            'product_id'=>$products
        ]);
    }
}