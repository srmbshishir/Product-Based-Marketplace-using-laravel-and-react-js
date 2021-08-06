<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
    <h1>welcome {{session('id')}}</h1>
    <h3> EDIT User</h3>

    <a href='/admin/index'> Back </a> 
    <form method="post" enctype="multipart/form-data">
        @csrf
      <table>
          <tr>
              <td>User Name</td>
              <td><input type="text" name="name" value="{{$user->name}}"></td>
          </tr>
          <tr>
            <td>User Email</td>
            <td><input type="text" name="email" value="{{$user->email}}"></td>
        </tr>
        <tr>
            <td>User address</td>
            <td><input type="text" name="address" value="{{$user->address}}"></td>
        </tr>
        <tr>
            <td>User Mobile</td>
            <td><input type="text" name="phone" value="{{$user->phone}}"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="{{$user->password}}"></td>
        </tr>
        <tr>
            <td>Re type Password</td>
            <td><input type="text" name="rpass" value=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="update" class="btn btn-primary" value="update"></td>
        </tr>
      </table>
    </form>
    <form method="post" enctype="multipart/form-data" action="/admin/pic/{{session('id')}}">
        @csrf 
        <img src="/upload/{{$user->image}}" width="200px" height="150px">
        <h5>change profile picture</h5>
        <input type="file" name="image" class="btn btn-warning">
        <input type="submit" name="update" class="btn btn-primary" value="change">
    </form>
      @foreach ($errors->all() as $error)
        {{$error}} <br>
      @endforeach
</body>
</html>