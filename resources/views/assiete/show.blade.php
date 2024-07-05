@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["assiete"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8 d-flex align-items-center">
      <div class="card-body">
        <h5 class="card-title text-center">
          {{ $viewData["assiete"]->getName() }} (${{ $viewData["assiete"]->getPrice() }})
        </h5>
        <p class="card-text text-center">{{ $viewData["assiete"]->getDescription() }}</p>
        <p class="card-text text-center">
          <form method="POST" action="{{ route('cart.add', ['id' => $viewData['assiete']->getId()]) }}">
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
