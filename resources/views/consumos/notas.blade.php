@extends('layouts.app')

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
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection