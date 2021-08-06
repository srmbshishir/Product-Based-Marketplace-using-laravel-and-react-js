<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;

class SaleExport implements FromQuery,WithHeadings
{

    public function headings():array{
        return[
            'Order id',
            'Product id',
            'Seller id',
            'Buyer Id',
            'Buyer Phone',
            'Product Name',
            'Buyer',
            'Payment Type',
            'Quantity',
            'Price',
            'Date',
            'Track'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {

        //$pending=DB::select("SELECT * FROM `orderlist` WHERE track!='delivered'");
        //return $pending::all();
        //return Order::where('track','!=','delivered');
       // $order =new Order();
        //$orders = $order->where('sellerid',session('id'));
        return Order::query()->where('sellerid',session('id'))->where('track','delivered')->orderBy('date','desc');
       // return 

    }
}
