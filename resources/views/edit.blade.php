<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>UPDATE PRODUCT</title>
    <style>
        .error{
            color: red;
        }
        #myForm{
            width: 450px;
            margin: 0 auto;
            background-color: rgb(100, 129, 100);
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        input{
            width: 100%;
            height: 35px;
            border-radius: 5px;
        }
        #backBtn{
            margin-left: 10%;
            margin-top: 20px;
        }
</style>
</head>
<body>
    <a href="{{ route('products.index')}}" >
        <button class="btn btn-primary" id="backBtn" type="submit">Back</button>
    </a>
    <form id="myForm" action="{{ route('products.update' , $data->id)}}" 
        enctype="multipart/form-data" method="post">
        @csrf
        <h2>Update Product</h2>

        <input type="text" name="name" placeholder="Enter Product Name" value="{{$data->name}}"><br>
        <span id="nameError" class="error"></span>
        <br><br>

        <input type="text" name="description" placeholder="Enter Description" value="{{$data->description}}"><br>
        <span id="descriptionError" class="error"></span>
        <br><br>

        <input type="numeric" name="price" placeholder="Enter Price" value="{{$data->price}}"><br> 
        <span id="priceError" class="error"></span>
        <br><br>

        <input type="file" name="image" value="{{$data->image}}"><br>
        <span id="fileError" class="error"></span>
        <br><br>

        <input type="submit" value="Submit" id="btnSubmit" class="btn btn-dark">
        <br><br>
    </form>
</body>
</html>