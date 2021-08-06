<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Welcome</h1>
    <h3>Name : {{session('name')}}</h3>
    <h3>User type : {{session('type')}}</h3>
    <h3>User id : {{session('id')}}</h3>
    

    <a href="{{route('add')}}"><button class="btn btn-success">Add Product</button></a>
    <a href="{{route('show')}}"><button class="btn btn-warning">Show Product</button></a>
    <a href="{{route('showOrder')}}"><button class="btn btn-primary">Show Orders</button></a>
    <a href="/seller/dashboard/{{session('id')}}/"><button class="btn btn-dark">Dashboard</button></a>
    <a href="/seller/profile/{{session('id')}}/"><button class="btn btn-info">My Profile</button></a>


    <a href="{{route('logout')}}"><button class="btn btn-danger">Log out</button></a>
</body>
</html>