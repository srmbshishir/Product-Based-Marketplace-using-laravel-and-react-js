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
    <h1>Hello</h1>
    <h3>{{session('name')}}</h3>
    <h3>{{session('type')}}</h3>

    
    <a href="{{route('adduser')}}"><button class="btn btn-success">Add user</button></a>
    <a href="{{route('approve')}}"><button class="btn btn-warning">Approve Products</button></a>
    <a href="{{route('showuser')}}"><button class="btn btn-primary">Show Users</button></a>
    <a href="/admin/profile/{{session('id')}}/"><button class="btn btn-info">My Profile</button></a>
    <a href="/admin/dashboard/"><button class="btn btn-dark">Dashboard</button></a>
    <a href="{{route('logout')}}"><button class="btn btn-danger">Log out</button></a>
</body>
</html>