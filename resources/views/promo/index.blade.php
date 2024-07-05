@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["promos"] as $promo)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$promo->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('promo.show', ['id'=> $promo->getId()]) }}"
          class="btn text-white">{{ $promo->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
