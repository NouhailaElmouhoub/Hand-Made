<!-- destroy.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Supprimer Utilisateur</h1>
    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
@endsection
