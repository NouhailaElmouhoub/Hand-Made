@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["bols"] as $bol)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$bol->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('bol.show', ['id'=> $bol->getId()]) }}"
          class="btn  text-white">{{ $bol->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
