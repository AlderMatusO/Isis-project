<template>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>Productos</h5>
                <button
                type="button"
                :class="['btn', 'btn-secondary', (isProdSelected && status < 2? 'visible' : 'invisible')]"
                @click="deleteSelection"
                data-toggle="tooltip"
                title="Eliminar Producto">
                    <i class="fas fa-trash-alt"/>
                </button>
                <button
                type="button"
                :class="['btn', 'btn-secondary', (listaProductos.length >= 1 && status < 2? 'visible' : 'invisible')]"
                data-toggle="tooltip"
                title="Cerrar Cuenta"
                @click="closeTicket">
                    <i class="fas fa-bell-slash"/>
                </button>
                <button
                type="button"
                :class="['btn', 'btn-primary', (status > 1? 'visible' : 'invisible')]"
                data-toggle="tooltip"
                title="Impimir Recibo"
                @click="printTicket">
                    <i class="fas fa-print"/>
                </button>
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
                        <h5 class="modal-title font-weight-bold">Agregar {{ productoActual.nombre }}
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
        data()
        {
            return {
                ticketId: 0,
                productoActual:
                {
                    id: 0,
                    nombre: "",
                    precios: {},
                    cantidad: 0,
                    precioSeleccionado: 0,
                },
                listaProductos: [],
                $modalAdd: {},
                status: 0
            }
        },
        created()
        {
            productBus.$on('productoSeleccionado', (producto) => {
                this.productoActual.id = producto.id;
                this.productoActual.nombre = producto.nombre;
            });
            productBus.$on('cambioDeTicket', (ticket) => {
                this.listaProductos = ticket.listaProductos,
                this.ticketId = ticket.id,
                this.status = ticket.status
            });
        },
        mounted()
        {
            this.$modalAdd = $("#nuevoProducto");
            this.$modalAdd.modal({show:false});
            this.$modalAdd.on('hidden.bs.modal', this.clearForm);
        },
        methods:
        {
            printTicket: function()
            {
                productBus.$emit('printTicket', this.ticketId);
            },
            closeTicket: function()
            {
                productBus.$emit('closeTicket', this.ticketId);
                this.status = 2;
            },
            clearForm: function()
            {
                this.productoActual.id = 0;
            },
            findPrecioPorKilo: function(listaPreciosPorKg, idsPreciosEnLista)
            {
                //Buscamos alguno de los 3 precios (por kilo) dentro de la lista de productos
                //Todos los modos de servicio que tiene el producto
                var precios_found = -1;

                Object.keys(this.productoActual.precios).forEach( (key) => {
                    key = parseInt(key);
                    if( this.productoActual.precios[key].modo_servicio_id == 1 /*1 kg*/ ||
                        this.productoActual.precios[key].modo_servicio_id == 2 /*1/2 kg*/||
                        this.productoActual.precios[key].modo_servicio_id == 3) /*1/4 kg*/
                    {
                        listaPreciosPorKg[this.productoActual.precios[key].modo_servicio_id] = {"id": key, "precio": this.productoActual.precios[key].precio};

                        if(idsPreciosEnLista.indexOf(key) >= 0)
                        {
                            precios_found = idsPreciosEnLista.indexOf(key);
                        }
                    }
                });

                return precios_found;
            },
            addProducto: function()
            {
                var precioActual = this.productoActual.precios[this.productoActual.precioSeleccionado];
                
                var ids = this.listaProductos.map(function(item){ return item.id; });
                var precios_por_kg = {};
                var isForKg = precioActual.modo_servicio_id === 1;
                var id = (isForKg?
                    this.findPrecioPorKilo(precios_por_kg, ids) :
                    ids.indexOf(precioActual.id));
                
                //Si el producto ya había sido agregado en la lista
                if( id >= 0 )
                {
                    //solo actualiza la cantidad
                    this.listaProductos[id].cantidad += this.productoActual.cantidad;
                    
                    //Sin embargo si es por kilo, además debe actualizar el precio si sobrepasa los límites
                    if(isForKg)
                    {
                        if(this.listaProductos[id].cantidad > 0.5)
                        {
                            this.listaProductos[id].id = precioActual.id;
                            this.listaProductos[id].precio = precioActual.precio;
                            this.listaProductos[id].modo_servicio_id = 1;
                        }
                        if(this.listaProductos[id].cantidad > 0.25 && this.listaProductos[id].cantidad <= 0.5)
                        {
                            this.listaProductos[id].id = precios_por_kg[2].id;
                            this.listaProductos[id].precio = precios_por_kg[2].precio;
                            this.listaProductos[id].modo_servicio_id = 2;
                        }
                        if(this.listaProductos[id].cantidad <= 0.25)
                        {
                            this.listaProductos[id].id = precios_por_kg[3].id;
                            this.listaProductos[id].precio = precios_por_kg[3].precio;
                            this.listaProductos[id].modo_servicio_id = 3;
                        }
                    }
                }
                else
                {
                    //Para despachar por kg se actualizan los precios dependiendo la cantidad
                    if( isForKg )
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
                    }
                    //Se agrega el nuevo producto en la lista
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

                this.selection(this.listaProductos.length - 1);
                var id = this.ticketId;
                productBus.$emit('listChanged', {'id': id, 'list': this.listaProductos});

                this.$modalAdd.modal('hide');
            },
            precioProducto: function( prodId )
            {
                var ids = this.listaProductos.map(function(item){ return item.id; });
                var id = ids.indexOf(prodId);
                if( id >= 0 )
                {
                    var divisor = 1.0;
                    if(this.listaProductos[id].modo_servicio_id == 2)
                        divisor = 0.50;
                    if(this.listaProductos[id].modo_servicio_id == 3)
                        divisor = 0.25;
                    return (parseFloat(this.listaProductos[id].precio) * parseFloat(this.listaProductos[id].cantidad/divisor)).toFixed(2);
                }
                return 0.00;
            },
            validaCantidad: function( evt )
            {
                var cantidadAceptaFloat = this.productoActual.precioSeleccionado>0? 
                    (this.productoActual.precios[this.productoActual.precioSeleccionado].modo_servicio_id === 1)
                    : false;
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                var val = this.productoActual.cantidad.toString();
                var decimals = val.length - (val.indexOf(".")==-1? 0 : val.indexOf(".") + 1);
                if((!cantidadAceptaFloat && charCode == 46) || (cantidadAceptaFloat && ((val.indexOf(".") >= 0 && charCode == 46)||(decimals >= 3)) ))
                {
                    evt.preventDefault();
                }                    
                else
                {
                    return true;
                }
            },
            getDescripcion: function( productoAgregado )
            {
                var retVal = "";
                if([1,2,3].includes(productoAgregado.modo_servicio_id))
                {
                    retVal += (productoAgregado.cantidad < 1.0? (productoAgregado.cantidad*1000).toFixed(2) + " g." : productoAgregado.cantidad.toFixed(2) + "Kg.")+
                                " - a $" + parseFloat(productoAgregado.precio).toFixed(2) + " ";
                    switch(productoAgregado.modo_servicio_id)
                    {
                        case 1:
                            retVal += "el kilo.";
                        break;
                        case 2:
                            retVal += "el medio.";
                        break;
                        case 3:
                            retVal += "el cuarto.";
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
            selection: function( idProd )
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
                
            },
            deleteSelection: function()
            {
                var id = this.listaProductos.indexOf(this.listaProductos.find(x=>(x.selected)));
                this.listaProductos.splice(id, 1);
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
            isProdSelected: function()
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