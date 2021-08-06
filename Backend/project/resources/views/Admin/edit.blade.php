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

    <a href='/admin/showUser'> Back </a> 
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
            <td><label for="type">User Type:</label></td>

            <td>
                <select name="type" id="type">
                    <option value="admin" {{$user->type=="admin" ? 'selected' : ''}}>Admin</option>
                    <option value="buyer" {{$user->type=="buyer" ? 'selected' : ''}}>Buyer</option>
                    <option value="seller" {{$user->type=="seller" ? 'selected' : ''}}>Seller</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="update" class="btn btn-primary" value="update"></td>
        </tr>
      </table>
    </form>
      @foreach ($errors->all() as $error)
        {{$error}} <br>
      @endforeach
</body>
</html>