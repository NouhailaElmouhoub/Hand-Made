@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["promo"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8 d-flex align-items-center">
      <div class="card-body text-center">
        <h5 class="card-title">
          {{ $viewData["promo"]->getName() }} (${{ $viewData["promo"]->getPrice() }})
        </h5>
        <p class="card-text">{{ $viewData["promo"]->getDescription() }}</p>
        <p class="card-text">
          <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['promo']->getId()]) }}">
            <div class="row justify-content-center">
              @csrf
              <div class="col-auto">
                <div class="input-group">
                  <div class="input-group-text">Quantity</div>
                  <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                </div>
              </div>
              <div class="col-auto">
                <button class="btn text-white" type="submit">Add to cart</button>
              </div>
            </div>
          </form>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
