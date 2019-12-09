@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row" id="restaurants">
                        @foreach($restaurants as $restaurant)
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ asset($restaurant->picture) }}">
                                <div class="card-block pl-1 pr-1 ">
                                    <h4 class="card-title">{{ $restaurant->name }}</h4>
                                    <div class="card-text">
                                        Direccion:  {{ $restaurant->address }}
                                        <br>
                                        Telefono: {{ $restaurant->telephone }}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-primary btn-block showPizza" data-id="{{ $restaurant->id }}">Ver Pizzas</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="pizzas" style="display: none;">
                    <div class="row"  >
                        @foreach($pizzas as $pizza)
                            <div class="col-md-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($pizza->picture) }}">
                                    <div class="card-block pl-1 pr-1 ">
                                        <h4 class="card-title">{{ $pizza->name }}</h4>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="btn btn-primary btn-block selectPizza" data-id="{{ $pizza->id }}">Seleccionar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row ">
                        <div class="col-md-4 offset-2 mt-5">
                            <a href="" class="btn btn-primary btn-block" id="showRestaurants">Ver restaurantes</a>
                        </div>
                        <div class="col-md-4 mt-5">
                            <a href="" class="btn btn-success btn-block">Votar</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            let pizza = [];

            $('.showPizza').click(function(e){
                e.preventDefault();
                // get restaurant
                let restaurantId =  $(this).data('id');

                console.log("restaurante id", restaurantId);

                // hide restaurants
                $("#restaurants").slideUp();
                $("#showRestaurants").show();
                $("#pizzas").slideDown();
            });

            // select pizzas
            $('.selectPizza').click(function(e){
                e.preventDefault();
                $(this).toggleClass('btn-default btn-primary');
                let id = $(this).data('id');

                var index = pizza.indexOf(id);
                if(index > -1) {
                    pizza.splice(index, 1);
                } else {
                    pizza.push(id);
                }



                console.log(pizza);
            });

            $('#showRestaurants').click(function(e){
                e.preventDefault();
                // hide restaurants
                $("#pizzas").slideUp();
                $("#restaurants").slideDown();
            });


        });
    </script>

@endsection
