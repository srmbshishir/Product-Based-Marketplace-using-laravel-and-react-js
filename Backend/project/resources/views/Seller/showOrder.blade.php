<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h3> Order List of {{session('id')}}</h3>

    <form method="get" enctype="multipart/form-data" action="/seller/showOrder/search">
        @csrf
        <input type="text" placeholder="Type order id/date" name="search">
        <input type="submit" name="khujo" value="Search">
    </form>
    <form method="get" enctype="multipart/form-data" action="/seller/showOrder/all">
        @csrf
        <input type="submit" name="khujo" value="Show All">
    </form>
    
    <a href='/seller/index'> Back </a> 
	<table class="table table-striped">
		<tr>
            <td>Order Id</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Payment type</td>
            <td>Buyer id</td>
            <td>Buyer phone</td>
            <td>Date</td>
            <td>Track</td>
		</tr>
        @foreach ($orderlist as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->p_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment}}</td>
                <td>{{$order->buyerid}}</td>
                <td>{{$order->buyerphone}}</td>
                <td>{{$order->date}}</td>
                <td>{{$order->track}}</td>
                <td>
                    <form method="post" enctype="multipart/form-data" action="/seller/showOrder/{{$order->id}}">
                        @csrf
                        <label for="track">Update Tracking:</label>
                
                        <select name="track" id="track">
                            <option value="order taken" {{$order->track=="order taken" ? 'selected' : ''}}>Order Taken</option>
                            <option value="Delivery man" {{$order->track=="Delivery man" ? 'selected' : ''}}>Delivery man taken</option>
                            <option value="Delivered" {{$order->track=="Delivered" ? 'selected' : ''}}>Delivered</option>
                        </select>
                        <input type="submit" name="khujo" value="Update Tracking">
                    </form>
                </td>
            </tr>
        @endforeach
 	</table>
     <style>
        .w-5{
            display: none;
        }
    </style>
    {{ $orderlist->appends(Request::except('page'))->links() }}
    </body>
</html>