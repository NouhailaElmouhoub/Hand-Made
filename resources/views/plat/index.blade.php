@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["plats"] as $plat)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$plat->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('plat.show', ['id'=> $plat->getId()]) }}"
          class="btn  text-white">{{ $plat->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
