<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            background-color: rgb(123, 123, 239);
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Details Of Your Product</h1><br>
    <h3>Product Name        : {{ $product['name'] }}</h3> <br>
    <h3>Product Description : {{ $product['description'] }}</h3> <br>
    <h3>Product Price       : {{ $product['price'] }}</h3> <br>
    <h3>Product Image       :  
        <img src="{{ public_path('storage/image/'.$product['image'])}}" alt="Item" width="100px" height="100px">            </td> 
    </h3> <br>            
    
</body>
</html>