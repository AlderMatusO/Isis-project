@extends('layouts.app')


@section('scripts')
    <script src="{{ asset('js/consumos.js') }}" defer></script>
@endsection
@section('content')
<div id="consumos" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="card">
        		<div class="card-header">
        			<h5><i class="fa fa-utensils"></i>&nbsp;&nbsp; Consumos</h5>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-minus"></i></a>
                        </li>
                    </ul>
        		</div>
        		
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            
                            <!-- Panel del menú -->
                            <menu-component></menu-component>
								
							<!-- Panel de la lista de los productos del consumo -->
							<ticket-component><ticket-component/>

                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection