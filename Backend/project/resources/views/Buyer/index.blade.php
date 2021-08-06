<!DOCTYPE html>
<html lang="en">
<head>
    <title>APWT Marketplace</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>
<body>
    <h1>APWT MarketPlace</h1>
    <a href="/buyer/profile/{{session('id')}}">{{ session('name') }}</a>
    <a href="/buyer/dashboard/{{session('id')}}"><button class="btn btn-dark">Dashboard</button></a>
    <a href="/buyer/{{ session('id') }}/track"><button class="btn btn-dangers">Orders</button></a>
    <form method="GET" action="{{ url('/buyer/show_cart/'.$userId) }}">

    <h2><button class="float-right" type="submit" >cart</button></h2>
        
    </form>
    <a href="{{route('logout')}}"><button>Log out</button></a>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @csrf
    <table class="table table-striped">
		<tr>
            <td>Product Id</td>
            <td>Product Name</td>
			<td>Price</td>
			<td>Condition</td>
            <td>Category</td>
            <td>Discount</td>
            <td>Quantity</td>
            <td>description</td>
            <td>image</td>
            <td>Action</td>
		</tr>
        @foreach ($product as $key => $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->p_condition}}</td>
                <td>{{$data->category}}</td>
                <td>{{$data->discount}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->description}}</td>
                <td><img src="/upload/{{$data->image}}" alt="" width="200px" height="150px"></td>
                <td><button>Buy</button><br><button onclick="addToCart('{{ $data->id }}' , '{{ $userId }}')">Add to cart</button></td>
            </tr>
        @endforeach
 	</table>
</body>
<script>
    function addToCart(productId,userId){
        $.ajax({
            headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            url : '/buyer',
            type: 'POST',
            data : {
                'productId': productId,
                'userId': userId
            },
            success: function(response){
                alert(response['message'])
            },
            error: function(xhr) {

            }
        })
    }

    function show(userId){
        $.ajax({
                url : '/buyer/show_cart/'+userId,
                type: 'GET',
                success: function(response){
                    alert('hello')
                },
                error: function(xhr) {

                }
            })
    }
</script>
</html>