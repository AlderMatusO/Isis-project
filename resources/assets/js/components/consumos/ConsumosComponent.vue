<template>
    <div class="card">
        <div class="card-header">
            <h5><i class="fa fa-utensils"></i>&nbsp;&nbsp; Consumos</h5>
            <ul class="nav nav-tabs">
                <li v-for="(ticket, index) in tickets" :key="index" class="nav-item">
                    <a :class="['nav-link', (index==ticketSel? 'active': '')]"
                    href="javascript:void(0)"
                    @click="ticketSel = index">
                        {{ticket.mesa}}({{getStatus(ticket.status)}})
                    </a>
                </li>
                <li class="nav-item">
                    <span data-toggle="tooltip"
                    data-title="Nuevo Ticket">
                        <a class="nav-link"
                        data-toggle="modal"
                        data-target="#nuevoTicket">
                            <i class="fas fa-plus"></i>
                        </a>
                    </span>
                </li>
                <li v-if="tickets.length > 0" class="nav-item">
                    <span data-toggle="tooltip"
                    data-title="Editar Ticket">
                        <a class="nav-link"
                        data-toggle="modal"
                        data-target="#nuevoTicket"
                        @click="activaEdicion">
                            <i class="fas fa-edit"></i>
                        </a>
                    </span>
                </li>
            </ul>
        </div>
        
        <div class="card-body">
            <div class="container">
                <div v-if="tickets.length > 0" class="row">
                    
                    <!-- Panel del menú -->
                    <menu-component></menu-component>
                        
                    <!-- Panel de la lista de los productos del consumo -->
                    <ticket-component></ticket-component>

                </div>
                <div v-else class="row justify-content-center text-muted">
                    <div class="col-sm text-center align-middle">
                        <i class="fas fa-exclamation-circle fa-5x"/>
                        <h2>No hay tickets pendientes</h2>
                    </div>
                </div>
            </div>
        </div>

        <div id="nuevoTicket" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ modalEdit? 'Editar Ticket' : 'Nuevo Ticket' }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body justify-content-center">
                        <form class="form">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Mesa</label>
                                    <select id="mesa" class="form-control" v-model="mesaSel">
                                        <option value="">Seleccione una opcion</option>
                                        <option v-for="(mesa, index) in mesas" :key="index" :value="mesa" v-if="showMesa(mesa)">{{mesa}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Mesero</label>
                                    <select id="mesero" class="form-control" v-model.number="meseroSel">
                                        <option value="-1">Seleccione una opcion</option>
                                        <option v-for="(mesero,index) in meseros" :key="mesero.id" :value="index">{{mesero.nombre}}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" :disabled="deshabilitaNuevoTicket" @click="addTicket">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { productBus } from './../../consumos.js'

	export default {
        components:
        {
            'ticket-component': require('./TicketComponent.vue'),
            'menu-component': require('./MenuComponent.vue')
        },
        data()
        {
            return{
                tickets: [
                    /*{
                        id : -1,
                        mesa: '',
                        mesero: '',
                        status: '',
                        listaProductos: []
                    }*/
                ],
                ticketSel: -1,
                mesas: [],
                meseros: [],
                mesaSel: "",
                meseroSel: -1,
                $modalAdd: {},
                modalEdit: false,
            }
        },
        created()
        {
            productBus.$on('listChanged', (obj) => {
                this.tickets[obj.id].listaProductos = obj.list;
            });

            productBus.$on('closeTicket', (id) => {
                var data = {
                    'tickets' : [
                        {
                        'mesa' : this.tickets[id].mesa,
                        'mesero' : this.tickets[id].mesero.id,
                        'status' : 1,
                        'productos' : this.tickets[id].listaProductos
                        }
                    ]
                };
                var config = {
                    headers : {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }

                axios
                .post('consumos/create', data, config);
            });
            document.addEventListener('beforeunload', this.saveAll);
        },
        mounted()
        {
            axios
			.get('consumos/mesas')
			.then((response) => {
				this.mesas = response.data;
            });
            axios
			.get('consumos/meseros')
			.then((response) => {
				this.meseros = response.data;
            });

            this.$nextTick( function(){
                axios
                .get('consumos/data')
                .then((response) => {
                    this.tickets = response.data;
                    this.ticketSel = 0;
                });
            });
            
            this.$modalAdd = $("#nuevoTicket");
            this.$modalAdd.modal({show:false});
            this.$modalAdd.on('hidden.bs.modal', this.clearForm);
        },
        methods:
        {
            saveAll()
            {
                var data = {
                    'tickets' : this.tickets.map( function( ticket )
                    {
                        return {
                        'mesa' : ticket.mesa,
                        'mesero' : ticket.mesero.id,
                        'status' : ticket.status,
                        'productos' : ticket.listaProductos
                        };
                    })
                };
                var config = {
                    headers : {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }

                axios
                .post('consumos/create', data, config);
            },
            showMesa( mesa )
            {
                var ticket = this.tickets.find( (item)=>{ return item.mesa == mesa && item.status < 3; });
                return ticket == null || ( this.modalEdit && mesa == this.tickets[this.ticketSel].mesa );
            },
            getStatus: function(status)
            {
                var str;
                switch(status)
                {
                    case 1: str = "Abierto"; break;
                    case 2: str = "Cerrado"; break;
                    case 3: str = "Pagado"; break;
                    case 4: str = "Cancelado"; break;
                }
                return str;
            },
            clearForm: function()
            {
                this.mesaSel = "";
                this.meseroSel = -1;
                this.modalEdit = false;
            },
            activaEdicion: function()
            {
                var $this = this;
                this.modalEdit = true;
                this.mesaSel = this.tickets[this.ticketSel].mesa;
                this.meseroSel = this.meseros.findIndex(function(item){
                    return item.nombre == $this.tickets[$this.ticketSel].mesero.nombre;
                });
            },
            addTicket: function()
            {

                if(!this.modalEdit)
                {
                    var index = this.tickets.push({
                        'id': -1,
                        'mesa': this.mesaSel,
                        'mesero': this.meseros[this.meseroSel],
                        'status': 1,
                        'listaProductos': []
                    })-1;
                    this.ticketSel = index;
                }
                else
                {
                    this.tickets[this.ticketSel].mesa = this.mesaSel;
                    this.tickets[this.ticketSel].mesero = this.meseros[this.meseroSel];
                }
                
                this.$modalAdd.modal('hide');
            },
        },
        watch:
        {
            'ticketSel' : {
                immediate : true,
                handler(newVal, oldVal)
                {
                    if(this.tickets.length > 0 && (newVal >= 0 && newVal < this.tickets.length))
                    {
                        productBus.$emit('cambioDeTicket',{
                            'id' : newVal,
                            'listaProductos': this.tickets[newVal].listaProductos,
                            'status' : this.tickets[newVal].status
                        });
                    }
                }
            }
        },
        computed:
        {
            deshabilitaNuevoTicket: function()
            {
                return (this.mesaSel == "" || this.meseroSel == -1);
            }
        }
    }
</script>