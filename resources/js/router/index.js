import { createRouter, createWebHistory } from "vue-router";
import Pizza from '../components/Pizza.vue';
import Cart from '../components/Cart.vue';
import Order from '../components/Order.vue';

const routes = [
    {
        path: '/',
        name: Pizza,
        component: Pizza
    },
    {
        path: '/cart',
        name: Cart,
        component: Cart
    },
    {
        path: '/order',
        name: Order,
        component: Order
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
