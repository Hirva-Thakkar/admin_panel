<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
<style>
#addNewProduct{
    margin-left: 80%;
    margin-top: 20px;
}
th{
    background-color: rgb(61, 87, 61);
    color: white;
}
</style>
</head>
<body>

<div class="">
    <a href="{{ route('products.create') }}">
        <button class="btn btn-primary" id="addNewProduct">Add New Product</button>
    </a>

<br><br>
<h2 style="text-align: center">ALL PRODUCTS</h2>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">DESCRIPTION</th>
        <th scope="col">PRICE</th>
        <th scope="col">IMAGE</th>
        <th colspan="3" style="text-align: center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['description'] }}</td>
            <td>{{ $item['price'] }}</td>
            <td>
                <img src="{{ public_path('storage/image/'.$item->image)}}" alt="Item" width="100px" height="100px">            </td> 
            <td>
                <a href="{{ route('products.edit', $item['id'])}}" >
                    <button class="btn btn-primary" type="submit">Edit</button>
                </a>
            </td>
            <td>
               <form action="{{ route('products.destroy', $item['id'])}}" method="post">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            <td>
                <a href="{{ route('products.generatePdf', $item['id'])}}" >
                    <button class="btn btn-success" type="submit">Generate PDF</button>
                </a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
</div>

   
</x-app-layout>
