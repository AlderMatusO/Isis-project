@extends('layouts.app')

@section('content')
<div class="container">
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
                            <!-- Panel de la lista de los productos del consumo -->
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Productos</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul id="products-list" class="list-group list-group-flush">
                                          <!--li tags with "list-group-item active" class-->
                                          <li class="list-group-item">
                                            <div class="container">
                                                <div class="row product-header">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Consome
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $100.00
                                                    </div>
                                                </div>
                                            
                                                <div class="row product-detail font-italic">
                                                    2 ordenes de 1 lt. - a $50.00 c/u
                                                </div>
                                            </div>
                                          </li>

                                          <li class="list-group-item">
                                            <div class="container">
                                                <div class="row product-header">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Barbacoa con hueso
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $220.00
                                                    </div>
                                                </div>
                                            
                                                <div class="row product-detail font-italic">
                                                    1 orden de 1/2 kg.
                                                </div>
                                            </div>
                                          </li>

                                          <li class="list-group-item">
                                            <div class="container">
                                                <div class="row product-header">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Tortillas
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $4.00
                                                    </div>
                                                </div>
                                            
                                                <div class="row product-detail font-italic">
                                                    2 piezas - a $2.00 c/u
                                                </div>
                                            </div>
                                          </li>

                                          <li class="list-group-item active">
                                            <div class="container">
                                                <div class="row product-header">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Negra Modelo
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $30.00
                                                    </div>
                                                </div>
                                            
                                                <div class="row product-detail font-italic">
                                                    1 pieza.
                                                </div>
                                            </div>
                                          </li>

                                          <li class="list-group-item">
                                            <div class="container">
                                                <div class="row product-header">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Limonada
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $30.00
                                                    </div>
                                                </div>
                                            
                                                <div class="row product-detail font-italic">
                                                    1 pieza.
                                                </div>
                                            </div>
                                          </li>

                                          <li class="list-group-item">
                                            <div class="container">
                                                <div class="row product-header text-right">
                                                    <div class="col-sm-9 p-0 text-truncate">
                                                        Total
                                                    </div>
                                                    <div class="col-sm-3 p-0 text-right">
                                                        $384.00
                                                    </div>
                                                </div>
                                            </div>
                                          </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Panel del menú -->
                            <div class="col-sm-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Men&uacute;</h5>
                                        <ul class="nav nav-pills">
                                            @foreach($categorias as $cat)
                                                <li class="nav-item">
                                                    <a class="nav-link{{ ($cat->id==2? ' active' : '') }} text-capitalize" href="#">
                                                        {{ $cat->descripcion}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <?php
                                                $tipo = 0;
                                                $n = 0;
                                            ?>
                                            @foreach($productos as $prod)
                                                @if( $prod->tipo_id != $tipo )
                                                    @if( $n > 0 )
                                                        </div>
                                                    @endif
                                                    <div class="row font-weight-bold"><h5><i class="fas fa-angle-right">
                                                        {{ $prod->tipo->nombre }} </i></h5></div>
                                                    <?php 
                                                        $tipo = $prod->tipo_id;
                                                        $n = 0;
                                                    ?>
                                                    <div class="row">
                                                @endif
                                                @if( $n == 4 )
                                                    </div>
                                                    <div class="row">
                                                    <?php $n = 0; ?>
                                                @endif
                                                <div class="col-md-3">
                                                    <div id="product-{{ $prod->id }}" class="card mb-3">
                                                        <img src="{{ asset('images/Productos/'.($prod->nombre_imagen != null? $prod->nombre_imagen : 'default.png')) }}" class="card-img-top" />
                                                        <h6 class="card-title text-center text-capitalize">{{ $prod->nombre }}</h6>
                                                    </div>
                                                </div>
                                                <?php $n++; ?>
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>

        	</div>
        </div>
    </div>
</div>
@endsection