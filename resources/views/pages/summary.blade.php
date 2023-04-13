@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overzicht</li>
        </ol>
        <div class="row">
        	<div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
        		<ul class="list-group">
				  <li class="list-group-item d-flex bg-info text-white justify-content-center align-items-center">
                    Alle Kosten
				  </li>
				  <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
				    Totale Inkomsten
				    <span class="badge badge-primary badge-pill">{{ $total_income }}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Totale Uitgaven
				    <span class="badge badge-danger badge-pill">{{ $total_expense }}</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Totale Balans
				    <span class="badge badge-primary badge-pill">{{ $balance }}</span>
				  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Totale Inboedel
				    <span class="badge badge-primary badge-pill">{{ $totalItems }}</span>
				  </li> -->
				</ul>
        	</div>
        </div>
        <br>

        <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ $total_income }} Totale Inkomen</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('incomes.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Bekijk Alles</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ $total_expense }} Totale Uitgaven</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('expense.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Bekijk Alles</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ $balance }} Totale Balans</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Bekijk Alles</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ $totalItems }} Meubel Uitgaven</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('items.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Bekijk Alles</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                    </div>
                    <div class="mr-5">{{ $totalNotes }} Abonnement Kosten</div>
                </div>
                <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('notes.index') }}"  class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">Bekijk Alles</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        </div> 
        <br>
        <hr>
        <br>
        <div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
        <ul class="list-group">
        <li class="list-group-item d-flex bg-info text-white justify-content-center align-items-center">
                    Alle Gegevens
		</li>
        </ul>
        </div>
        <br>
        <div class="row">
            @foreach($results as $result)
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white {{($result['type'] == 'income')? 'bg-info':'bg-danger'}} o-hidden h-100">
                        <div class="card-header">
                            <!-- <span class="float-left text-dark">{{($result['type'] == 'income')? $result['created_at']:$result['created_at']}}</span> -->
                            <div>
                                <h4>
                                {{($result['type'] == 'income')? $result['income_title']:$result['expense_title']}}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body-icon mt-5">
                                <i class="fas fa-fw {{($result['type'] == 'income')? 'fa-dollar-sign':'fa-money-bill'}} "></i>
                            </div>
                            <div class="font-weight-bold text-dark">{{($result['type'] == 'income')? '€ '.$result['income_amount']: '€ '.$result['expense_amount']}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
