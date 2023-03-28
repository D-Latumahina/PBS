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
<body id="page-top">
<div class="container py-md-5 container--narrow">
<form action="/wishlist/create" method="POST">
        @csrf
          <div class="form-group">
            <label for="wishlist-product" class="text-muted mb-1"><small>Product</small></label>
            <input value="{{old('product')}}" name="product" id="wishlist-product" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('product')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="wishlist-description" class="text-muted mb-1"><small>Description</small></label>
            <input value="{{old('description')}}" name="description" id="wishlist-description" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('description')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="wishlist-price" class="text-muted mb-1"><small>Price</small></label>
            <input value="{{old('price')}}" name="price" id="wishlist-price" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('price')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="wishlist-url" class="text-muted mb-1"><small>Url</small></label>
            <input value="{{old('url')}}" name="url" id="wishlist-url" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('url')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
        </div>
          <button type="submit" class="btn btn-primary">Save New Wishlist Item</button>
        </form>
      </div>
</body>
</html>