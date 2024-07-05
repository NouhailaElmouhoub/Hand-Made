<!-- edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Editer Utilisateur</h1>
    <form action="{{ route('admin.user.update', ['id'=> $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Vos champs de formulaire pour l'édition -->
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
@endsection
