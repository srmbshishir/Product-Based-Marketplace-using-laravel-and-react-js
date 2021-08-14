<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
//use validator;
use Illuminate\Support\Facades\DB;
use App\Exports\SaleExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function showOrder($id){
        $order =new Order();
        $orders = $order->where('sellerid',$id)->orderBy('date', 'DESC')->get();
        return $orders;


        //$orders= DB::select("SELECT * FROM `orderlist` WHERE sellerid='".session('id')."' order by id desc")->pagination(5);
        //return view('Seller.showOrder')->with('orderlist', $orders);
    }
    public function search($id, $key)
    {
        //$orders= DB::select("SELECT * FROM `orderlist` WHERE id like '".$req->search."%' or date like '".$req->search."%'");
        $order =new Order();
        $orders = $order->where('id','like','%'.$key.'%')->where('sellerid',$id)->orwhere('date','like','%'.$key.'%')->where('sellerid',$id)->get();
        //SELECT * FROM `product` WHERE id like 'elec%' or category like 'elec%'
        //dd($req->all());
        return $orders;
    }
    public function track(Request $req, $id)
    {
        $order= Order::find($id);
        //print_r($order);
        $order->track = $req->track;
        //print_r($order->track);

        $order->save();
        //dd($req->all());
        return json_encode("order status updated to $order->track");
    }
    public function trackOrder(Request $req, $id){
        $order = new Order;
        $orders = $order->where('buyerid',session('id'));
        return view('Buyer.orderTrack')->with('orderlist',$orders);
    }
    public function dashboard($id){
        //SELECT sum(price) FROM `orderlist` WHERE track='delivered' and sellerid='S-104'
        $orders= DB::select("SELECT sum(price) as total_income FROM `orderlist` WHERE track='delivered' and sellerid='".$id."'");
        //SELECT sum(price) FROM `orderlist` WHERE track='delivered' and sellerid='S-104' and MONTH(date) = MONTH(CURRENT_DATE())
        $month_income= DB::select("SELECT sum(price) as month_income FROM `orderlist` WHERE track='delivered' and sellerid='".$id."' and MONTH(date) = MONTH(CURRENT_DATE())");
        //SELECT count(*) FROM `orderlist` WHERE track!='delivered'
        $pending=DB::select("SELECT count(*) as pending FROM `orderlist` WHERE track!='delivered' and sellerid='".$id."'");


       // prinpt_r($orders[0][0]);
         $data = [
             'total_income'             => $orders,
             'current_month_income'     => $month_income,
             'pending'                  => $pending
        ];
       //  dd($req->all());
       //  print_r($data['total_income'][0]->sum(price));
        return $data;
    }
    public function export(){
        return Excel::download(new SaleExport,'invoices.xlsx');
    }
    public function admindashboard(Request $req){
        //SELECT sum(price) FROM `orderlist` where track='delivered''
        $orders= DB::select("SELECT sum(price) as sum FROM `orderlist` WHERE track='delivered'");
        //SELECT sum(price),sellerid FROM `orderlist` GROUP BY sellerid
        $sellers=DB::select("SELECT sum(price) as sum,sellerid FROM `orderlist` GROUP BY sellerid");



       // print_r($sellers[0]->sum);
         $data = [
             'total_income'             => $orders,
             'seller'                   => $sellers,

        ];
       //  dd($req->all());
       //  print_r($data['total_income'][0]->sum(price));
        return $data;
    }
    public function buyerdashboard(Request $req, $id){
        //SELECT sum(price) FROM `orderlist` WHERE track='delivered' and sellerid='S-104'
        $orders= DB::select("SELECT sum(price) FROM `orderlist` WHERE track='delivered' and buyerid='".session('id')."'");
        //SELECT sum(price) FROM `orderlist` WHERE track='delivered' and sellerid='S-104' and MONTH(date) = MONTH(CURRENT_DATE())
        $month_income= DB::select("SELECT sum(price) FROM `orderlist` WHERE track='delivered' and buyerid='".session('id')."' and MONTH(date) = MONTH(CURRENT_DATE())");
        //SELECT count(*) FROM `orderlist` WHERE track!='delivered'
        //$pending=DB::select("SELECT count(*) FROM `orderlist` WHERE track!='delivered'");


       // prinpt_r($orders[0][0]);
         $data = [
             'total_cost'             => $orders,
             'current_month_income'     => $month_income
            // 'pending'                  => $pending
        ];
       //  dd($req->all());
       //  print_r($data['total_income'][0]->sum(price));
        return view('Buyer.dashboard')->with('orderlist', $data);
    }    
    public function showBuyerOrder(Request $req){
        $order =new Order();
        $orders = $order->where('buyerid',session('id'))->orderBy('date', 'DESC')->paginate(3);
        return view('Buyer.showBuyerOrder')->with('orderlist', $orders);


        //$orders= DB::select("SELECT * FROM `orderlist` WHERE sellerid='".session('id')."' order by id desc")->pagination(5);
        //return view('Seller.showOrder')->with('orderlist', $orders);
    }
}
