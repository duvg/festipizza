@extends('layouts.app')


@section('styles')
    <style>
        div.stars {
            display: inline-block;
            margin: 0;
        }

        input.star { display: none; }

        label.star {
            float: right;
            padding: 0px 10px;
            font-size: 20px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: "\f005";
            color: #ffd700;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #e7ad05;
            text-shadow: 0 0 5px #7f8c8d;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
            content: "\f006";
            font-family: FontAwesome;
        }


        .horline > li:not(:last-child):after {
            content: " |";
        }
        .horline > li {
            font-weight: bold;
            color: #ff7e1a;

        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (\Session::has('error'))
                <div class="alert alert-danger">
                    {!! \Session::get('error') !!}
                </div>
            @endif

            <div class="card" style="background: #000; border: thin solid #000; color: #FFF">
                <div class="card-header" style="text-align: center"><h2>Elije la pizza que más te gusto</h2></div>

                <div class="card-body">
                    <div class="row" id="restaurants">
                        @foreach($restaurants->votes as $restaurant)
                        <div class="col-md-3 mb-3">
                            <div class="card" style="background: #000; border: thin solid #fff; color: #FFF">
                                <img class="card-img-top" src="{{ asset($restaurant->picture) }}">
                                <div class="card-block pl-1 pr-1 ">
                                    <h4 class="card-title" style="text-align: center">{{ $restaurant->name }}</h4>

                                </div>
                                <div class="card-footer" style="margin-top: 0;padding-top: 0">
                                    <div class="stars">
                                        <form class="form-horizontal poststars" action="{{ route('votes') }}"  id="addStar{{ $restaurant->id }}" method="POST">
                                            @csrf
                                            <div class="form-group required">
                                                <input type="hidden" value="{{ $restaurant->id }}" name="id">
                                                <input type="hidden" value="" name="id" class="miip">
                                                    <input class="star star-5" value="5" id="star-5{{ $restaurant->id }}" type="radio" name="star"/>
                                                    <label class="star star-5" for="star-5{{ $restaurant->id }}"></label>
                                                    <input class="star star-4" value="4" id="star-4{{ $restaurant->id }}" type="radio" name="star"/>
                                                    <label class="star star-4" for="star-4{{ $restaurant->id }}"></label>
                                                    <input class="star star-3" value="3" id="star-3{{ $restaurant->id }}" type="radio" name="star"/>
                                                    <label class="star star-3" for="star-3{{ $restaurant->id }}"></label>
                                                    <input class="star star-2" value="2" id="star-2{{ $restaurant->id }}" type="radio" name="star"/>
                                                    <label class="star star-2" for="star-2{{ $restaurant->id }}"></label>
                                                    <input class="star star-1" value="1" id="star-1{{ $restaurant->id }}" type="radio" name="star"/>
                                                    <label class="star star-1" for="star-1{{ $restaurant->id }}"></label>
                                                <button type="submit" class="btn btn-primary btn-block showPizza" data-id="{{ $restaurant->id }}">Votar</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{--
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
                    --}}
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

            $(".miip").val(localStorage.getItem("miip"));

    /*
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
*/

        });
    </script>

@endsection
