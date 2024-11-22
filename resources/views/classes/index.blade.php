<!-- resources/views/pages/classes/index.blade.php -->

@extends('layouts.default')

@section('content')
    <h2>Liste des Classes</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Niveau</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->nom }}</td>
                    <td>{{ $classe->niveau }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection