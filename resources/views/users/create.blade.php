@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un utilisateur</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="idrole" class="form-label">Rôle</label>
            <select name="idrole" id="idrole" class="form-control" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->idrole }}">{{ $role->typerole }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
