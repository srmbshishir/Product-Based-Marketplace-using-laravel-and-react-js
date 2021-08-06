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
    <h3> Admin id: {{session('id')}}</h3>

    <form method="get" enctype="multipart/form-data" action="/admin/showProduct/search">
        
        <input type="text" placeholder="Type product id/type" name="search">
        <input type="submit" name="" value="Search">
    </form>
    <form method="get" enctype="multipart/form-data" action="/admin/showProduct/all">
        @csrf
        <input type="submit" name="khujo" value="Show All">
    </form>
    
    <a href='/admin/index'> Back </a> 
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
            <td>update status</td>
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
                <td><img src="/upload/{{$product->image}}" alt="" width="100px" height="80px"></td>
                <td>{{$product->status}}</td>
                <td>
                    <form method="post" enctype="multipart/form-data" action="/admin/status/{{$product->id}}">
                        @csrf
                        <label for="status">Update Status:</label>
                
                        <select name="status" id="status">
                            <option value="pending" {{$product->status=="pending" ? 'selected' : ''}}>Pending</option>
                            <option value="accepted" {{$product->status=="accepted" ? 'selected' : ''}}>Accepted</option>
                            <option value="cancelled" {{$product->status=="cancelled" ? 'selected' : ''}}>Cancelled</option>
                        </select>
                        <input type="submit" name="khujo" value="Update Status">
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
     {{ $userlist->appends(Request::except('page'))->links() }}
    </body>
</html>