<template>
	<div class="col-sm-8">
		<div class="card">
			<div class="card-header">
				<h5>Men&uacute;</h5>
				<ul class="nav nav-pills" role="tablist">
					<li
					v-for="categoria in categorias"
					:key="categoria.id" class="nav-item">

						<a
						:class="[ (categoria.id==categoriaSeleccionada.id)? 'active' : '',
						'nav-link',
						'text-capitalize']"
						href="javascript:void(0)"
						@click="cambiarCategoria(categoria.id)">

							{{ categoria.descripcion }}

						</a>

					</li>					
				</ul>
			</div>
			<div class="card-body">				
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
							class="card mb-3">

								<img
								:src="producto.nombre_imagen"
								class="card-img-top" />

								<h6 class="card-title text-center text-capitalize">
									<b> {{ producto.nombre }} </b>
								</h6>
							
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</template>		
		
<script>
	export default {
		
		data() {
			return {
				categoriaSeleccionada : {
					id:2,
					obj: {}
				},
				categorias : [],
				menu : []
			}
		},
		mounted() {
			axios
			.get('consumos/categorias')
			.then((response) => {
				this.categorias = response.data;
			})

			this.getProductos()
		},
		methods: {
			getProductos()
			{
				if(this.categoriaSeleccionada.id in this.menu){
					this.categoriaSeleccionada.obj = this.menu[ this.categoriaSeleccionada.id  ];
				}
				else
				{
					axios
					.get('consumos/productos/'+this.categoriaSeleccionada['id'])
					.then((response) => {
						this.categoriaSeleccionada.obj = response.data
						this.menu[this.categoriaSeleccionada['id']] = response.data
					})
				}
			},
			cambiarCategoria(value)
			{
				this.categoriaSeleccionada.id = value;
				this.getProductos();
			}
		}
	}
</script>