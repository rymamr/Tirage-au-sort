<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirage au Sort des Élèves</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tirage au Sort des Élèves</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('tirage') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="idcours">Sélectionnez un Cours</label>
                <select name="idcours" id="idcours" class="form-control" required>
                    <option value="">-- Choisissez un cours --</option>
                    @foreach($cours as $coursItem)
                        <option value="{{ $coursItem->id }}">{{ $coursItem->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tirer un Élève</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>