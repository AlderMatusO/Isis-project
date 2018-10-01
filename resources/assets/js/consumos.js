
export const productBus = new Vue();

const app = new Vue({
    el: '#consumos',
    components: {
        'menu-component': require('./components/consumos/MenuComponent.vue'),
        'ticket-component': require('./components/consumos/TicketComponent.vue')
    }
});