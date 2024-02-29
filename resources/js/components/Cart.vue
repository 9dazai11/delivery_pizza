<template>
    <div class="container">
        <h2>Корзина</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Пицца</th>
                    <th scope="col">Цена за пиццу, руб.</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Общая стоимость, руб.</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in cartItems" :key="index">
                    <td>{{ item.pizza.name }}</td>
                    <td>{{ item.pizza.price }}</td>
                    <td><input type="number" v-model="item.quantity" min="1" @input="updateCartItem(item.id)" /></td>
                    <td>{{ item.total_price }}</td>
                    <td><button @click="removeFromCart(item.id)" class="btn btn-danger">Удалить из корзины</button></td>
                </tr>
            </tbody>
        </table>
        <p>Общая стоимость корзины: {{ total }} руб.</p>
        <router-link to="/orders">
            <button class="btn btn-primary">Оформить заказ</button>
        </router-link>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            cartItems: [],
            total: 0,
        };
    },
    mounted() {
        this.fetchCart();
    },
    methods: {
        fetchCart() {
            axios.get('/api/cart').then(response => {
                if (Array.isArray(response.data)) {
                    this.cartItems = response.data.map(item => ({
                        ...item,
                        total_price: parseFloat(item.total_price),
                    }));
                    this.calculateTotal();
                }
            });
        },
        removeFromCart(id) {
            axios.delete(`/api/cart/${id}`).then(response => {
                this.fetchCart();
            });
        },
        updateCartItem(id) {
            const cartItem = this.cartItems.find(item => item.id === id);

            if (cartItem) {
                axios.put(`/api/cart/${id}`, { quantity: cartItem.quantity }).then(response => {
                    this.fetchCart();
                });
            }

        },
        calculateTotal() {
            this.total = this.cartItems.reduce((sum, item) => sum + (item.total_price || 0), 0);
        },
    },
};
</script>
  