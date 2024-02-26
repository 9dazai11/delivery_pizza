<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Пиццерия</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Пиццерия</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('pizza.index')}}">Пиццы</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('pizzaOrder.index')}}">Корзина</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('order.index')}}">Оформление заказа</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
        @yield('content')
    </div>
</body>
</html>