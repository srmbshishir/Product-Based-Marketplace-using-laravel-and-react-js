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
    <a href='/admin/index'> Back </a>
    <h1>Dashbaord</h1>
    {{--$orderlist[0][0]--}}
    {{--$orderlist['current_month_income']--}}
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total transaction money</h5>
            <p class="card-text">
                @foreach($orderlist['total_income'][0] as $link)
                    <h1>Tk. {{ $link }}</h1>
                @endforeach
            </p>
        </div>
    </div>

    <h1>Top seller table</h1>
    <table class="table table-dark table-striped">
        <tr>
            <td>Sellerid</td>
            <td>Amount</td>
        </tr>
        @foreach($orderlist['seller'] as $link)
        <tr>
            <td>{{ $link->sellerid}}</td>
            <td>{{ $link->sum}}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>