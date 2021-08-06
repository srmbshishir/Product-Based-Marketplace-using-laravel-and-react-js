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
    <h3> Product List of {{session('id')}}</h3>

    <form method="get" enctype="multipart/form-data" action="/seller/showProduct/search">
        @csrf
        <input type="text" placeholder="Type product id/type" name="search">
        <input type="submit" name="khujo" value="Search">
    </form>
    <form method="get" enctype="multipart/form-data" action="/seller/showProduct/all">
        @csrf
        <input type="submit" name="khujo" value="Show All">
    </form>
    
    <a href='/seller/index'> Back </a> 
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
            <td>status</td>
            <td>Action</td>
		</tr>
        @foreach ($userlist as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->p_condition}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->discount}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->description}}</td>
                <td><img src="/upload/{{$product->image}}" alt="" width="200px" height="150px"></td>
                <td>{{$product->status}}</td>

                <td>
                    <a href="/product/{{$product->id}}/edit/"> Edit</a>
                    <a href="/product/{{$product->id}}/delete/" onclick="return confirm('Are you sure?')">Delete</a>
                
                    {{--
                        <a href="/product/{{$product['name']}}/edit/"> Edit</a>
                    <a href="/product/{{$product['name']}}/delete/">Delete</a>
                        <form action="/product/{{$product['name']}}/" method="DELETE">
                        <input type="submit" value="Delete" />
                        </form>
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="/user/details/{{$user['id']}}"> Details</a> |
                    <a href="/user/edit/{{$user['id']}}"> Edit</a> |
                    <a href="/user/delete/{{$user['id']}}"> Delete</a> 
                --}}
                </td>
            </tr>
        @endforeach
 	</table>
     <style>
         .w-5{
             display: none;
         }
     </style>
     {{ $userlist->appends(Request::except('page'))->links() }}
    </body>
</html>