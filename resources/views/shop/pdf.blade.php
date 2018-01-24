<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create PDF</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-12">
        <h1>bill</h1>

        <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>quantity</th>
                <th>item</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product['quantity']}}</td>
                <td>{{$product['item']['name']}}</td>
                <td>{{$product['price']}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        </div>
    </div> 
</div>
</body>
</html>