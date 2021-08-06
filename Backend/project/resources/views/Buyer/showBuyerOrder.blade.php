<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Order List of {{session('id')}}</h3>

    <form method="get" enctype="multipart/form-data" action="/seller/showOrder/search">
        @csrf
        <input type="text" placeholder="Type order id/date" name="search">
        <input type="submit" name="khujo" value="Search">
    </form>
    <form method="get" enctype="multipart/form-data" action="/seller/showOrder/all">
        @csrf
        <input type="submit" name="khujo" value="Show All">
    </form>

</body>
</html>