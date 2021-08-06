<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Registration Page</title>
</head>
<body>
	<h1 align="center">Register Form</h1>
	<a href='/login' class="btn btn-danger"> Login </a>

	<form action="" method="post" enctype="multipart/form-data">
		@csrf
	<div align="center">
		<fieldset>
			<table>
				<tr>
					<td><input type="text" name="name" id="name" placeholder="Name" /></td>
				</tr>
				<tr>
					<td><input type="email" name="email" id="email" placeholder="Email" /></td>
				</tr>
				<tr>
					<td><input type="text" name="address" id="address" placeholder="Address" /></td>
				</tr>
				<tr>
					<td><input type="phone" name="phone" id="phone" placeholder="Contact Number" /></td>
				</tr>
				<tr>
					<td>User Type: 
					<select name="type">
						<option value="seller">Seller</option>
						<option value="buyer">Buyer</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Picture: <input type="file" name="image"/>
					</td>
				</tr>
				<tr>
					<td><input type="password" name="password" id="pass" placeholder="Password" /></td>
				</tr>
				<tr>
					<td><input type="password" name="rpass" id="rpass" placeholder="Re-type Password" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="Register" value="submit"/></td>
				</tr>
			</table>
			<a href="/" class="btn btn-danger">Home</a>
		</fieldset>
	</div>
	{{session('msg')}}
	@foreach ($errors->all() as $error)
	{{$error}} <br>
	@endforeach
	
	@if ($errors =="")
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ "success" }}</strong>
		</div>
	@endif
	</form>
	
</body>
</html>