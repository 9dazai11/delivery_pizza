<template>
  <div class="container mt-4">
    <form @submit.prevent="submitForm">
      <div class="mb-3">
        <label for="name" class="from-lable">Полное имя</label>
        <input type="text" class="form-control" id="name" v-model="order.name" placeholder="Полное имя" required>
      </div>
      <div class="mb-3">
        <label for="address" class="from-lable">Адрес</label>
        <input type="text" class="form-control" id="address" v-model="order.address" placeholder="Адрес"
          required>
      </div>
      <div class="mb-3">
        <label for="phone" class="from-lable">Номер телефона</label>
        <input type="text" class="form-control" id="phone" v-model="order.phone" placeholder="Номер телефона" required />
      </div>
      <div class="mb-3">
        <label for="comment" class="from-lable">Комментарий</label>
        <textarea class="form-control" id="comment" v-model="order.comment" placeholder="Комментарий"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Заказать</button>
    </form>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      order: {
        name: '',
        address: '',
        phone: '',
        comment: ''
      },
    };
  },
  methods: {
    submitForm() {
      axios.post('/api/orders', this.order)
        .then(response => {
          console.log(response.data.message);
          // Очистите форму или перенаправьте пользователя
          this.$router.push('/');
        })
        .catch(error => {
          console.error('Error submitting order:', error);
        });
    },
  }
};
</script>
  