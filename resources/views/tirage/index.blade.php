@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Interrogation tirée au sort pour le cours : {{ $cours->name }}</h1>

        <div class="mb-4">
            <h2>Informations sur le cours</h2>
            <p><strong>Nom du cours :</strong> {{ $cours->name }}</p>
            <p><strong>Classe :</strong> {{ $cours->classe->name }}</p>
            <p><strong>Nombre d'élèves :</strong> {{ $cours->classe->students->count() }}</p>
        </div>

        <div class="mb-4">
            <h2>Liste des élèves</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Date de dernière interrogation</th>
                        <th>Poids (Jours depuis la dernière interrogation)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cours->classe->students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                @php
                                    $lastInterrogation = \App\Models\Interrogation::where('id', $student->id)
                                        ->where('idcours', $cours->id)
                                        ->orderBy('date_heure', 'desc')
                                        ->first();
                                    echo $lastInterrogation ? $lastInterrogation->date_heure->format('d/m/Y H:i') : 'Aucune interrogation';
                                @endphp
                            </td>
                            <td>
                                @php
                                    $weight = $lastInterrogation ? now()->diffInDays($lastInterrogation->date_heure) : 100;
                                    echo $weight;
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            <h2>Tirage au sort</h2>
            <form action="{{ route('tirage.store', ['idcours' => $cours->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="duree">Durée de l'interrogation (en minutes)</label>
                    <input type="number" id="duree" name="duree" class="form-control" value="10">
                </div>
                <div class="form-group">
                    <label for="commentaire">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="3">Interrogation tirée au sort</textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tirer au sort</button>
            </form>
        </div>
    </div>
@endsection
