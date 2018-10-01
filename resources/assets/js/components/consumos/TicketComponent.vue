<template>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>Productos</h5>
                <button :class="(isProdSelected? 'visible' : 'invisible')"><i class="fas fa-trash-alt"/></button>
            </div>
            <div class="card-body p-0">
                <ul id="products-list" class="list-group list-group-flush">
                    <li v-for="(producto, index) in listaProductos"
                        :key="producto.id"
                        :class="['list-group-item', (producto.selected? 'active' : '')]"
                        @click="selection( index )">
                        <div class="container">
                            <div class="row product-header">
                                <div class="col-sm-9 p-0 text-truncate">
                                    {{producto.nombre}}
                                </div>
                                <div class="col-sm-3 p-0 text-right">
                                    ${{ precioProducto( producto.id ) }}
                                </div>
                            </div>
                    
                            <div class="row product-detail font-italic">
                                {{ getDescripcion( producto ) }}
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
                                    ${{ total }} <!-- computado -->
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="nuevoProducto" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar {{ productoActual.nombre }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Presentacion:</label>
                                <select v-if="mostrarSelect" class="form-control" v-model.number="productoActual.precioSeleccionado">
                                    <option :value="0">Seleccione una opcion</option>
                                    <option v-for="precio in productoActual.precios" :key="precio.id"
                                        v-if="![2,3].includes(precio.modo_servicio_id)"
                                        :value="precio.id">
                                        {{ precio.modo_servicio }}
                                    </option>
                                </select>
                                <b v-else>{{ presentacionDefault }}</b>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cantidad:</label>
                                <input type="number"
                                class="form-control"
                                v-model.number="productoActual.cantidad"
                                min="0"
                                :step="cantidadStep"
                                @keypress="validaCantidad">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" :disabled="disableSubmit" @click="addProducto">Aceptar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { productBus } from './../../consumos.js'
    export default {
        data() {
            return {
                productoActual: {
                    id: 0,
                    nombre: "",
                    precios: {},
                    cantidad: 0,
                    precioSeleccionado: 0,
                },
                listaProductos: [],
                $modalAdd: {}
            }
        },
        created()
        {
            productBus.$on('productoSeleccionado', (producto) => {
                this.productoActual.id = producto.id;
                this.productoActual.nombre = producto.nombre;
            });
        },
        mounted()
        {
            this.$modalAdd = $("#nuevoProducto");
            this.$modalAdd.modal({show:false});
            this.$modalAdd.on('hidden.bs.modal', this.modalAddHidden);
        },
        methods: {
            modalAddHidden: function()
            {
                this.productoActual.id = 0;
            },
            addProducto: function()
            {                
                var precioActual = this.productoActual.precios[this.productoActual.precioSeleccionado];
                
                var ids = this.listaProductos.map(function(item){ return item.id; });
                var id = -1;
                
                if( precioActual.modo_servicio_id === 1) //Fué por kilogramo
                {
                    
                    var precio_found = -1;
                    var modo_servicio_found = -1;
                    var precios_por_kg = {};

                    //Todos los modos de servicio que tiene el producto
                    Object.keys(this.productoActual.precios).forEach( (key) => {
                        key = parseInt(key);
                        if( this.productoActual.precios[key].modo_servicio_id == 1 /*1 kg*/ ||
                            this.productoActual.precios[key].modo_servicio_id == 2 /*1/2 kg*/||
                            this.productoActual.precios[key].modo_servicio_id == 3) /*1/4 kg*/
                        {
                            precios_por_kg[this.productoActual.precios[key].modo_servicio_id] = {"id": key, "precio": this.productoActual.precios[key].precio};

                            if(ids.indexOf(key) >= 0)
                            {
                                precio_found = ids.indexOf(key);
                            }
                        }
                    });

                    if( precio_found >= 0)
                    {
                        
                        this.listaProductos[precio_found].cantidad += this.productoActual.cantidad;
                        if(this.listaProductos[precio_found].cantidad > 0.5)
                        {
                            this.listaProductos[precio_found].id = precioActual.id;
                            this.listaProductos[precio_found].precio = precioActual.precio;
                            this.listaProductos[precio_found].modo_servicio_id = 1;
                        }
                        if(this.listaProductos[precio_found].cantidad > 0.25 && this.listaProductos[precio_found].cantidad <= 0.5)
                        {
                            this.listaProductos[precio_found].id = precios_por_kg[2].id;
                            this.listaProductos[precio_found].precio = precios_por_kg[2].precio;
                            this.listaProductos[precio_found].modo_servicio_id = 2;
                        }
                        if(this.listaProductos[precio_found].cantidad <= 0.25)
                        {
                            this.listaProductos[precio_found].id = precios_por_kg[3].id;
                            this.listaProductos[precio_found].precio = precios_por_kg[3].precio;
                            this.listaProductos[precio_found].modo_servicio_id = 3;
                        }
                    }
                    else
                    {
                        if(this.productoActual.cantidad >= 0.5 && this.productoActual.cantidad < 1.0)
                        {
                            precioActual.id = precios_por_kg[2].id;
                            precioActual.precio = precios_por_kg[2].precio;
                            precioActual.modo_servicio_id = 2;
                        }
                        if(this.productoActual.cantidad < 0.5)
                        {
                            precioActual.id = precios_por_kg[3].id;
                            precioActual.precio = precios_por_kg[3].precio;
                            precioActual.modo_servicio_id = 3;
                        }

                        this.listaProductos.push(
                        {
                            "id": precioActual.id,
                            "nombre":this.productoActual.nombre,
                            "cantidad":this.productoActual.cantidad,
                            "modo_servicio_id":precioActual.modo_servicio_id,
                            "modo_servicio":precioActual.modo_servicio,                    
                            "precio":precioActual.precio,
                            "selected":false
                        });
                    }
                }
                else
                {
                    if((id = ids.indexOf(precioActual.id)) >= 0)
                    {
                        this.listaProductos[id].cantidad += this.productoActual.cantidad;
                    }
                    else
                    {
                        this.listaProductos.push(
                        {
                            "id": precioActual.id,
                            "nombre":this.productoActual.nombre,
                            "cantidad":this.productoActual.cantidad,
                            "modo_servicio_id":precioActual.modo_servicio_id,
                            "modo_servicio":precioActual.modo_servicio,                    
                            "precio":precioActual.precio,
                            "selected":false
                        });
                    }
                }
                this.selection(this.listaProductos.length - 1);

                this.$modalAdd.modal('hide');
            },
            precioProducto( prodId )
            {
                var ids = this.listaProductos.map(function(item){ return item.id; });
                var id = ids.indexOf(prodId);
                if( id >= 0 )
                {
                    var divisor = 1.0;
                    if([2,3].includes(this.listaProductos[id].modo_servicio_id))
                    {
                        switch(this.listaProductos[id].modo_servicio_id){
                            case 2:
                                divisor = 0.50;
                            break;
                            case 3:
                                divisor = 0.25;
                            break;
                        }
                    }
                    return (parseFloat(this.listaProductos[id].precio) * parseFloat(this.listaProductos[id].cantidad/divisor)).toFixed(2);
                }
                return 0.00;
            },
            validaCantidad( evt )
            {
                var cantidadAceptaFloat = this.productoActual.precioSeleccionado>0? 
                    (this.productoActual.precios[this.productoActual.precioSeleccionado].modo_servicio_id === 1)
                    : false;
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if(!cantidadAceptaFloat && charCode == 46)
                {
                    evt.preventDefault();
                }                    
                else
                {
                    return true;
                }
            },
            getDescripcion( productoAgregado ){
                var retVal = "";
                if([1,2,3].includes(productoAgregado.modo_servicio_id))
                {
                    retVal += (productoAgregado.cantidad < 1.0? (productoAgregado.cantidad*1000).toString() + " g." : productoAgregado.cantidad + "Kg.")+
                                " - a $" + parseFloat(productoAgregado.precio).toFixed(2) + " ";
                    switch(productoAgregado.modo_servicio_id)
                    {
                        case 1:
                            retVal += "el kilo."
                        break;
                        case 2:
                            retVal += "el medio."
                        break;
                        case 3:
                            retVal += "el cuarto."
                        break;
                    }
                }
                else
                {
                    retVal += productoAgregado.cantidad + " ";
                    switch(productoAgregado.modo_servicio_id)
                    {
                        case 5: //Orden
                            retVal += productoAgregado.modo_servicio + (productoAgregado.cantidad > 1? "es":"");
                        break;
                        case 9: //Litro
                            retVal += productoAgregado.cantidad > 1? "Litros" : "Litro";
                        break;
                        case 10://Jarra
                            retVal += productoAgregado.cantidad > 1? "Jarras" : "Jarra";
                        break;
                        default:
                            retVal += productoAgregado.modo_servicio + (productoAgregado.cantidad > 1? "s":"");
                        break;
                    }
                    retVal += " - a $" + parseFloat(productoAgregado.precio).toFixed(2) + " c/u.";
                }
                return retVal;
            },
            selection( idProd )
            {
                if(this.listaProductos[idProd].selected)
                {
                    this.listaProductos[idProd].selected = false;
                }
                else
                {
                    this.listaProductos.forEach(
                        function(item)
                        {
                            item.selected = false;
                        }
                    );
                    this.listaProductos[idProd].selected = true;
                }
                
            }
        },
        watch: {
            'productoActual.id': function(newVal, oldVal)
            {
                if(oldVal == 0){
                    //
                    axios
                    .get('consumos/precios/' + this.productoActual.id)
                    .then((response) => {
                        this.productoActual.precios = response.data;
                    })
                }
                if(newVal == 0){
                    this.productoActual.nombre = "";
                    this.productoActual.precios = {};
                    this.productoActual.cantidad = 0;
                    this.productoActual.precioSeleccionado = 0;
                }
            },
            'productoActual.precios' : function(newVal, oldVal)
            {
                // Revisa que el nuevo objeto 'precios' no esté vacío
                if( Object.keys(newVal).length > 0)
                    this.$modalAdd.modal('show');
            },
            'productoActual.precioSeleccionado' : function(newVal, oldVal)
            {
                if(newVal > 0 && this.productoActual.precios[newVal].modo_servicio_id == 1)
                {
                    this.productoActual.cantidad = parseFloat(this.productoActual.cantidad).toFixed(1);
                }
                else
                {
                    this.productoActual.cantidad = parseInt(this.productoActual.cantidad);
                }
            },
        },
        computed: {
            disableSubmit: function()
            {
                //Valida el form del modal que agrega nuevo producto a la lista
                return (this.mostrarSelect && this.productoActual.precioSeleccionado <= 0)||
                (this.productoActual.cantidad == "" || this.productoActual.cantidad <= 0);
            },
            mostrarSelect: function()
            {
                var idPrecios = Object.keys(this.productoActual.precios);
                if(idPrecios.length > 1){
                    var idModServ = [];
                    for(var index in this.productoActual.precios)
                    {
                        idModServ.push(this.productoActual.precios[index].modo_servicio_id)
                    }
                    //Devuelve true a menos que los 3 productos que hayan sean id 2 y 3
                    return !(idPrecios.length === 3 && (idModServ.includes(2)||idModServ.includes(3)));
                }
                else
                    return false;
            },
            presentacionDefault: function()
            {
                var retVal = "";
                if(Object.keys(this.productoActual.precios).length > 0)
                {
                    retVal = this.productoActual.precios[Object.keys(this.productoActual.precios)[0]].modo_servicio;
                    this.productoActual.precioSeleccionado = parseInt(Object.keys(this.productoActual.precios)[0]);
                }
                return retVal;
                
            },
            cantidadStep: function()
            {
                var cantidadAceptaFloat = this.productoActual.precioSeleccionado>0? 
                    (this.productoActual.precios[this.productoActual.precioSeleccionado].modo_servicio_id === 1)
                    : false;
                return (cantidadAceptaFloat? "0.1" : "1");
            },
            total: function()
            {
                var $this = this;
                if(this.listaProductos.length>0)
                    return this.listaProductos.map(
                        function(prod)
                        {
                            return parseFloat($this.precioProducto(prod.id));
                        }
                    )
                    .reduce(
                        function(acumulado, actual)
                        {
                            return acumulado + actual;
                        }
                    ).toFixed(2);
                else return (0.0).toFixed(2);
            },
            isProdSelected()
            {
                return this.listaProductos.length>0 && this.listaProductos.find(
                    function(element)
                    {
                        return element.selected;
                    }
                ) != null;
            }
        }
    }
</script>