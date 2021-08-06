<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
    <h1>Buyer Cart</h1>
    <form method="post">
        <table>
            <tr>
                <td>product id</td>
                <td>Product name</td>
                <td>Quantity</td>
                <td>Price</td>
            </tr>
            @foreach($cartInfo as $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
            </tr>
            @endforeach
        </table>
    <input type='submit' value='Confirm Order' action="{{ action('CartController@store') }}">
    <a href="/buyer/{id}/index">Go Back</a>

    </form>
    
</body>
</html>