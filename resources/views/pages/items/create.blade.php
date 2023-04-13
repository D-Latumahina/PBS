@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('items.index') }}">Meubels</a>
            </li>
            <li class="breadcrumb-item active">Toevoegen</li>
        </ol>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card mx-auto mt-5">
                    <div class="card-header">Meubel Toevoegen</div>
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="item_title" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="item_title">
                                    <label for="item_title">Meubel</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="number" step="any" min="0.01" id="item_amount" class="form-control" placeholder="Password" required="required" name="item_amount">
                                    <label for="item_amount">Prijs</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="date" id="item_date" class="form-control" placeholder="Password" required="required" name="item_date" value="{{ date('Y-m-d') }}">
                                    <label for="item_date">Datum Aankoop</label>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('items.index') }}" class="btn btn-success">Terug</a>
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
