@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/overview">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Meubels</li>
        </ol>

        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show rounded" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span></button> <i class="fa fa-info mx-2"></i>
            <strong>{!! session('message') !!}</strong>
        </div>
        @endif

        <div class="row">
        <div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
            <ul class="list-group">
                <li class="list-group-item bg-info text-center text-white">
                    <span>Totale Inboedel</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
				    Totale Waarde
                      <span class="badge badge-primary badge-pill">{{ $totalItems }}</span>
				</li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
				    <a href="{{ route('items.create') }}" class="badge badge-success p-2 mx-auto" >Meubel Toevoegen</a>
				  </li>
            </ul>
        </div>
    </div>

        <div class="row">
            @foreach($items as $item)
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-100">
                        <div class="card-header">
                            <span class="float-left">{{ $item->item_date }}</span>
                            <span class="btn-group-sm float-right">
                                <!-- <a href="{{ route('items.edit',$item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('items.delete',$item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="card-body-icon mt-5">
                                <i class="fas fa-fw fa-sticky-note"></i>
                            </div>
                            <div>
                                <h2>
                                {{ $item->item_title }}
                                </h2>
                            </div>
                            <hr>
                            <div>
                                <h4>
                                €{{ $item->item_amount }}
                                </h4>
                            </div>
                            <br>
                            <a href="{{ route('items.edit',$item->id) }}" class="btn btn-sm btn-success float-right"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('items.delete',$item->id) }}" class="btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xl-12 col-sm-12">
                {{ $items->links() }}
            </div>
        </div>
@endsection
