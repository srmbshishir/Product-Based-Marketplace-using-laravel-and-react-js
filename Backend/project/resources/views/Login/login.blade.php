<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
	<h1>Login Page</h1>

	<form method="post">
        @csrf
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" class="form-control" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" class="form-control" value="Submit"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="/register">Register Here.</a></td>
                <td></td>
            </tr>
            <tr>
                <td>
                <a href="/" class="btn btn-danger">Back</a>
                </td>
            </tr>
        </table>
        {{session('msg')}}
        @foreach ($errors->all() as $error)
		{{$error}} <br>
	    @endforeach
	</form>
</body>
</html>