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
    <h3> User List</h3>
    <form method="get" enctype="multipart/form-data" action="/admin/showuser/search">
        <input type="text" placeholder="Type user id/type" name="search">
        <input type="submit" name="" value="Search">
    </form>
    <form method="get" enctype="multipart/form-data" action="/admin/showuser/all">
        @csrf
        <input type="submit" name="khujo" value="Show All">
    </form>

    
    <a href='/admin/index'> Back </a> 
	<table class="table table-striped">
		<tr>
            <td>User Id</td>
            <td>Name</td>
			<td>Email</td>
			<td>User Type</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Image</td>
            <td>status</td>
            <td>change status</td>
            <td>Action</td>
		</tr>
        @foreach ($userlist as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->type}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                <td><img src="/upload/{{$user->image}}" alt="" width="100px" height="80px"></td>
                <td>{{$user->status}}</td>
                <td>
                    <form method="post" enctype="multipart/form-data" action="/admin/userstatus/{{$user->id}}">
                        @csrf
                        <select name="status" id="status">
                            <option value="active" {{$user->status=="active" ? 'selected' : ''}}>Active</option>
                            <option value="blocked" {{$user->status=="blocked" ? 'selected' : ''}}>Blocked</option>
                        </select>
                        <input type="submit" name="khujo" value="Update Status">
                    </form>
                </td>

                <td>
                    <a href="/admin/{{$user->id}}/edit/"> Edit</a>
                    
                
                    {{--
                        <a href="/admin/{{$user->id}}/delete/" onclick="return confirm('Are you sure?')">Delete</a>
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