@extends('layouts.ecomm.master')

@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a href="ordernow" class="btn btn-success">Order Now</a> <br><br>

            @foreach ($products as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}" alt="{{$item->name}}">
                    </a>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <h3>{{$item->name}}</h3>
                        <h5>{{$item->description}}</h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove to Cart</a>
                </div>
            </div>
            @endforeach
        </div>

        <a href="ordernow" class="btn btn-success">Order Now</a> <br><br>
    </div>
</div>
@endsection