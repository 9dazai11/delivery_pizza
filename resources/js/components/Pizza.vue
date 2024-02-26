<template>
    <div class="container">
        <div class="row">
            <div v-for="pizza in pizzas" :key="pizza.id" class="col-lg-4 mb-3">
                <div class="card border-light mb-3" style="width: 18rem; height: 100%;">
                    <img :src="pizza.image" alt="Pizza Image" class="img-fluid">
                    <div class="card-body d-flex flex-column">
                        <h2>{{ pizza.name }}</h2>
                        <p>{{ pizza.description }}</p>
                        <div class="mt-auto">
                            <p>{{ pizza.price }} руб.</p>
                            <form @submit.prevent="addToCart(pizza.id)" class="d-flex align-items-center">
                                <input type="number" class="form-group col-4" id="quantity" v-model="pizza.quantity" min="1" placeholder="кол-во">
                                &nbsp;
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
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
        };
    },
    mounted() {
        axios.get('/api/pizzas')
            .then(response => {
                this.pizzas = response.data;
            })
            .catch(error => {
                console.error('Error fetching pizzas:', error);
            });
    },
    methods: {
        addToCart(pizzaId) {
            
            console.log('Adding pizza with ID:', pizzaId);
        },
    }
}
</script>
  
<style scoped>
.container {
    margin-top: 20px;
}
</style>
