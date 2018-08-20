@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Menú Principal</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="{{ route('consumos') }}">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-utensils fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Consumos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-calendar fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Eventos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-car-side fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Estacionamiento</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-money-bill fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Egresos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END OF FIRST ROW -->
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-chart-pie fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Reportes</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-swatchbook fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Cat&aacute;logos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-file-invoice-dollar fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Facturas</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mm-element">
                                    <a href="#">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <i class="fa fa-book fa-5x"></i>
                                            </div>
                                            <h5 class="card-title text-center mm-e-title">Bit&aacute;coras</h5>
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
