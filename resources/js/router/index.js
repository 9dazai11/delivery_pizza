import { createRouter, createWebHistory } from "vue-router";
import Pizza from '../components/Pizza.vue';
import Cart from '../components/Cart.vue';
import Order from '../components/Order.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Pizza
    },
    {
        path: '/pizzas',
        name: 'pizzas',
        component: Pizza
    },
    {
        path: '/cart',
        name: 'cart',
        component: Cart
    },
    {
        path: '/orders',
        name: 'order',
        component: Order
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
