@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card ">
                <div class="card-header "><h5>Menú Principal</h5></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="{{ route('consumos') }}">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-utensils fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Consumos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-calendar fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Eventos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-car-side fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Estacionamiento</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-money-bill fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Egresos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END OF FIRST ROW -->
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-chart-pie fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Reportes</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-swatchbook fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Cat&aacute;logos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-file-invoice-dollar fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Facturas</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card my-4">
                                    <a class="simple-link" href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-book fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mt-2">Bit&aacute;coras</h5>
                                        </div>
                                    </a>
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
