<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <a href='/buyer/{{ session('id') }}/index'> Back </a>
    <h1>Dashbaord</h1>
    {{--$orderlist[0][0]--}}
    {{--$orderlist['current_month_income']--}}
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total money cost</h5>
            <p class="card-text">
                @foreach($orderlist['total_cost'][0] as $link)
                    <h1>Tk. {{ $link }}</h1>
                @endforeach
            </p>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Income this month</h5>
            <p class="card-text">
                @foreach($orderlist['current_month_income'][0] as $mon)
                    <h1>Tk. {{ $mon }}</h1>
                @endforeach </p>
        </div>
    </div>
    
</body>
</html>