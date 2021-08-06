<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href='/seller/index'> Back </a> |
    <a href='/logout'> logout</a> 
    <h3> Create New Product</h3>
    {{session('id')}}

	<form method="post" enctype="multipart/form-data">
		@csrf
	<table>
		<tr>
			<td>Product name</td>
			<td><input type="text" name="name"></td>
		</tr>
        <tr>
            <td><label for="condition">Condition:</label></td>

            <td>
                <select name="condition" id="condition">
                    <option value="new">New</option>
                    <option value="old">Old</option>
                    <option value="used-new">Used but new</option>
                </select>
            </td>
		</tr>
        <tr>
            <td><label for="category">Category:</label></td>

            <td>
                <select name="category" id="category">
                    <option value="cloths">Cloths</option>
                    <option value="electronics">Electronics</option>
                    <option value="plants">Plants</option>
                    <option value="dailylife">Life accessories</option>
                </select>
            </td>
		</tr>
        <tr>
			<td>Discount</td>
			<td><input type="text" name="discount" placeholder="enter percentage"></td>
		</tr>
        <tr>
			<td>Quantity</td>
			<td><input type="text" name="quantity" value="1"></td>
		</tr>
        <tr>
			<td>Price</td>
			<td><input type="text" name="price"></td>
		</tr>
        <tr>
			<td>Description</td>
			<td><textarea rows="4" cols="50" name="description">
                Enter Description...</textarea></td>
		</tr>
		<tr>
			<td>Image</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="create" value="Create"></td>
		</tr>
	</table>
	</form>
    @foreach ($errors->all() as $error)
    {{$error}} <br>
    @endforeach
</body>
</html>