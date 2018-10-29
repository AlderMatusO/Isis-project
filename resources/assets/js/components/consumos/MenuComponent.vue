<template>
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header">
				<h5>Men&uacute;</h5>

				<div class="nav nav-pills" role="tablist">
					<div
					v-for="categoria in categorias"
					:key="categoria.id" class="nav-item">

						<a
						:class="[ (categoria.id==categoriaSeleccionada.id)? 'active' : '',
						'nav-link',
						'text-capitalize']"
						href="javascript:void(0)"
						@click="categoriaSeleccionada.id = categoria.id">
							{{ categoria.descripcion }}
						</a>

					</div>

					<!-- Barra de Búsqueda -->
					<form class="form-inline">
						<i class="fas fa-search" aria-hidden="true"></i>

						<input type="text"
						class="form-control ml-3 mw-100"
						placeholder="Buscar Producto"
						aria-label="search"
						v-model="busqueda">

					</form>
				</div>

			</div>
			<div v-if="!closed" class="card-body">				
				<div v-for="(items, index) in categoriaSeleccionada['obj']"
				:key="index"
				class="container">

					<div class="row font-weight-bold"><h5><i class="fas fa-angle-right"> {{ index }} </i></h5></div>
					<div class="row">
						<div
						v-for="producto in items"
						:key="producto.id"
						class="col-md-3">

							<div
							:id="'product-' + producto.id"
							class="product-card card mb-3">
								<a class="simple-link"
									href="javascript:void(0)"
									@click="productoSeleccionado(producto)">
									<img
									:src="producto.nombre_imagen"
									class="card-img-top" />
									<div class="card-img-overlay bg-dark text-white text-center align-middle">
										<i class="fas fa-plus-circle fa-3x"></i>
									</div>

									<h6 class="card-title text-center text-capitalize">
										<b> {{ producto.nombre }} </b>
									</h6>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div v-else class="card-body">
				<div class="container">
					<div class="row justify-content-center text-muted">
						<div class="col-sm text-center align-middle">
							<i class="fas fa-exclamation-circle fa-5x"/>
							<h2>No se pueden agregar productos al ticket</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
		
<script>
	var debounce = require('debounce');
	import { productBus } from './../../consumos.js'

	export default {
		
		data()
		{
			return {
				closed : false,
				categoriaSeleccionada : {
					id: 0,
					obj: {}
				},
				categorias : [],
				busqueda : "",
				menu : {}
			}
		},
		created()
		{
			this.getProductos = debounce( this.getProductos, 300);
			productBus.$on('cambioDeTicket', (ticket) => {
				closed = ticket.status > 1;
			});
		},
		mounted()
		{
			axios
			.get('consumos/categorias')
			.then((response) => {
				this.categorias = response.data;
			})

			this.categoriaSeleccionada.id = 1;

		},
		methods:
		{
			getProductos()
			{
				if(this.categoriaSeleccionada.id in this.menu)
				{
					this.categoriaSeleccionada.obj = this.menu[ this.categoriaSeleccionada.id  ];
				}
				else
				{
					var parameter = (this.categoriaSeleccionada.id > 0? this.categoriaSeleccionada.id : this.busqueda)
					axios
					.get('consumos/productos/' + parameter)
					.then((response) => {
						this.categoriaSeleccionada.obj = response.data
						// solo guardo en caché cuando cat > 0 y la categoria aun no esté en el menu
						if(this.categoriaSeleccionada.id > 0 && !(this.categoriaSeleccionada.id in this.menu))
							this.menu[this.categoriaSeleccionada['id']] = response.data
					});
				}
				
			},
			productoSeleccionado(producto)
			{
				productBus.$emit('productoSeleccionado', producto);
			}
		},
		watch:
		{
			'categoriaSeleccionada.id' : function()
			{
				this.getProductos()
			},
			'busqueda' : function( newVal, oldVal )
			{
				/*
				 * Este método muta el valor del id de la categoria; el valor original es pasado a
				 * un numero negativo cuando se llena el campo de busqueda y devuelto a positivo
				 * cuando se borre. A la magnitud original en negativo se le va restando el numero
				 * de caracteres de la busqueda mientras vaya en aumento y sumando cuando va decrementando
				 * a cuentas de que al final regrese al valor original.
				 */

				var deltaVal = oldVal.length - newVal.length;
				var in_limits = ( oldVal.length == 0 || newVal.length == 0 )
				if( in_limits )
				{
					this.categoriaSeleccionada.id = ( oldVal.length == 0? -this.categoriaSeleccionada.id + deltaVal :
					-(this.categoriaSeleccionada.id + deltaVal) );
				}
				else
				{
					this.categoriaSeleccionada.id += deltaVal;
				}
			}
		}
	}
</script>