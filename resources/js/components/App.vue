import { RouterView } from 'vue-router';

<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <RouterLink to="/" class="navbar-brand">Pizza`s</RouterLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <RouterLink to="/pizzas" class="nav-link active" aria-current="page">Пиццы</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink to="/orders" class="nav-link active" aria-current="page">Заказ</RouterLink>
            </li>
          </ul>
          <form class="d-flex">
            <RouterLink to="/cart" class="btn btn-outline-success" aria-current="page">Корзина</RouterLink>
          </form>
        </div>
      </div>
    </nav>
  </div>

  <RouterView></RouterView>
</template>