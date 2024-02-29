<template>
    <div>
        <h2>Корзина</h2>
        <div v-for="(item, index) in cartItems" :key="index">
            <!-- <img :src="item.pizza.photo" alt="Pizza Photo" /> -->
            <h3>{{ item.pizza.name }}</h3>
            <p>Количество: {{ item.quantity }}</p>
            <p>Цена за единицу: ${{ item.pizza.price }}</p>
            <p>Общая стоимость: ${{ item.total_price }}</p>
            <button @click="removeFromCart(item.id)">Удалить из корзины</button>
            <input type="number" v-model="item.quantity" min="1" @input="updateCartItem(item.id)" />
        </div>
        <p>Общая стоимость корзины: ${{ total }}</p>
        <router-link to="/orders">
            <button>Оформить заказ</button>
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
        // Загрузка корзины с сервера при монтировании компонента
        this.fetchCart();
    },
    methods: {
        fetchCart() {
            // Загрузка корзины с сервера
            axios.get('/api/cart').then(response => {
                if (Array.isArray(response.data)) {
                    this.cartItems = response.data.map(item => ({
                        ...item,
                        total_price: parseFloat(item.total_price), // или parseInt(item.total_price)
                    }));
                    this.calculateTotal();
                }
            });
        },
        removeFromCart(id) {
            // Удаление позиции из корзины
            axios.delete(`/api/cart/${id}`).then(response => {
                this.fetchCart();
            });
        },
        updateCartItem(id) {
            // Обновление количества товара в корзине
            // const cartItem = this.cartItems[id];
            const cartItem = this.cartItems.find(item => item.id === id);

            if (cartItem) {
                axios.put(`/api/cart/${id}`, { quantity: cartItem.quantity }).then(response => {
                    // cartItem.quantity = response.data.quantity;
                    // cartItem.total_price = response.data.total_price;
                    this.fetchCart();
                });
            }

        },
        calculateTotal() {
            // Рассчет общей стоимости корзины
            this.total = this.cartItems.reduce((sum, item) => sum + (item.total_price || 0), 0);
        },
    },
};
</script>
  