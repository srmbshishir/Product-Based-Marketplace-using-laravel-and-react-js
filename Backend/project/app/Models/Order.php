<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orderlist';
    //protected $primaryKey = 'sellerid';
    public $timestamps = false;
    public $incrementing = false;
}
