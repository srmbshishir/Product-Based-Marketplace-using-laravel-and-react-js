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
    {{--<a href='/home'> Back </a> |
    <a href='/logout'> logout</a> 
  --}}
  <h3> EDIT User</h3>

  <a href='/seller/index'> Back </a> 
  <form method="post" enctype="multipart/form-data">
      @csrf
    <table>
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="name" value="{{$product->name}}"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" value="{{$product->price}}"></td>
        </tr>
        <tr>
            <td><label for="condition">Condition:</label></td>
            <td>
                <select name="condition" id="condition">
                    <option value="new" {{$product->p_condition=="new" ? 'selected' : ''}}>New</option>
                    <option value="old" {{$product->p_condition=="old" ? 'selected' : ''}}>Old</option>
                    <option value="used-new" {{$product->p_condition=="used-new" ? 'selected' : ''}}>Used but new</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="category">Category:</label></td>

            <td>
                <select name="category" id="category">
                    <option value="cloths" {{$product->category=="cloths" ? 'selected' : ''}}>Cloths</option>
                    <option value="electronics" {{$product->category=="electronics" ? 'selected' : ''}}>Electronics</option>
                    <option value="plants" {{$product->category=="plants" ? 'selected' : ''}}>Plants</option>
                    <option value="dailylife" {{$product->category=="dailylife" ? 'selected' : ''}}>Life accessories</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>discount</td>
            <td><input type="text" name="discount" value="{{$product->discount}}"></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><input type="text" name="quantity" value="{{$product->quantity}}"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="description">{{$product->description}}</textarea></td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="image"></td>
        </tr>

        {{--solution not found for value in image--}}

      <tr>
          <td></td>
          <td><input type="submit" name="update" value="update"></td>
      </tr>
  </table>
  </form>
  @foreach ($errors->all() as $error)
  {{$error}} <br>
  @endforeach
</body>
</html>