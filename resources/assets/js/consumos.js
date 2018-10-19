
export const productBus = new Vue();

const notas = new Vue({
    el: '#consumos',
    components: {
        'consumos-component': require('./components/consumos/ConsumosComponent.vue')
    }
});