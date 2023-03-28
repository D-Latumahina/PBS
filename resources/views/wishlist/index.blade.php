@extends('layouts.dashboard')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist {{auth()->user()->name}}</title>

            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container px-4 px-lg-5">
    <a href="/wishlist/create"><button class="btn btn-primary ">Item toevoegen</button></a>
    <br>
    <br>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Beschrijving</th>
      <th scope="col">Prijs</th>
      <th scope="col">Url</th>
    </tr>
  </thead>
  @foreach(auth()->user()->wishlists as $wishlist)
  <tbody>
    <tr>
      <th scope="row">{{$wishlist->id}}</th>
      <td>{{$wishlist->product}}</td>
      <td>{{$wishlist->description}}</td>
      <td>€{{$wishlist->price}}</td>
      <td><a href="{{$wishlist->url}}">{{$wishlist->url}}</a></td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>
    
</body>
</html>