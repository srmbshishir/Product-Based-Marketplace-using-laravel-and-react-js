<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tracking</title>
</head>
<body>
    <h1>Tracking of ordered products</h1>
    <a href="/buyer/{{ session('id') }}/index">Go Back</a>
    <h3> Order List of {{session('id')}}</h3>

        <table class="table table-striped">
            <tr>
                <td>Product Id</td>
                <td>Product Name</td>
                <td>payment method</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>track</td>
            </tr>
            @foreach ($orderlist as $order)
                <tr>
                    <td>{{$order->productid}}</td>
                    <td>{{$order->p_name}}</td>
                    <td>{{$order->payment }}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->track}}</td>
                </tr>
            @endforeach
         </table>
    
</body>
</html>