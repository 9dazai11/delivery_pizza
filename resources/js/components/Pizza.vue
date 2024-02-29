<template>
    <div class="container">
        <div class="row">
            <div v-for="pizza in pizzas" :key="pizza.id" class="col-lg-4 mb-3">
                <div class="card border-light mb-3" style="width: 18rem; height: 100%;">
                    <img :src="pizza.image" alt="Pizza Image" class="img-fluid">
                    <div class="card-body d-flex flex-column">
                        <h2>{{ pizza.name }}</h2>
                        <p>{{ pizza.description }}</p>
                        <!-- <div class="mt-auto">
                            <p>{{ pizza.price }} руб.</p>
                            <input v-model="pizzaQuantity[pizza.id]" type="number" min="1" placeholder="Количество">
                            <button @click="addToCart(pizza.id, pizzaQuantity[pizza.id], pizza.price)" class="btn btn-primary">Добавить в корзину</button>
                        </div> -->
                        <div class="mt-auto">
                            <div>
                                <span> {{ pizza.price }} </span>
                                <input v-model="pizzaQuantity[pizza.id]" type="number" class="form-control" style="width: 100px;" min="1"
                                    placeholder="Количество">
                                <button @click="addToCart(pizza.id, pizzaQuantity[pizza.id], pizza.price)"
                                    class="btn btn-primary">Добавить в корзину</button>
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
            pizzas: [],
            pizzaQuantity: {}
        };
    },
    mounted() {
        axios.get('/api/pizzas')
            .then(response => {
                this.pizzas = response.data;

                this.pizzaQuantity = {};
                this.pizzas.forEach(pizza => {
                    this.pizzaQuantity = Object.assign({}, this.pizzaQuantity, { [pizza.id]: 1 });
                });
            })
            .catch(error => {
                console.error('Ошибка при получении пиццы:', error);
            });
    },
    methods: {
        addToCart(pizzaId, quantity, price) {
            const totalPrice = (quantity * price).toFixed(2);

            axios.post('/api/cart', {
                pizza_id: pizzaId,
                quantity: quantity,
                total: price
            })
                .then(response => {
                    console.log(`Добавлено в корзину: Пицца ID ${pizzaId}, Количество: ${quantity}, Общая стоимость: ${totalPrice} руб.`);
                    this.pizzaQuantity[pizzaId] = 1;
                })
                .catch(error => {
                    console.error('Ошибка при добавлении в корзину:', error);
                });
        },
    }
}
</script>
