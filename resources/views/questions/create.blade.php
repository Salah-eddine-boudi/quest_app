<!DOCTYPE html>
<html lang="en">
<head>@csrf
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une question</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter votre propre CSS si nécessaire -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Créer une Question</h1>
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf

            <!-- Titre -->
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <!-- Contenu -->
            <div class="form-group">
                <label for="content">Contenu:</label>
                <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
            </div>

            <!-- Rubrique -->
            <div class="form-group">
                <label for="rubric_id">Rubrique:</label>
                <select id="rubric_id" name="rubric_id" class="form-control" required>
                    <!-- Remplir avec les rubriques disponibles -->
                    @foreach($rubrics as $rubric)
                        <option value="{{ $rubric->id }}">{{ $rubric->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <!-- Ajouter les scripts Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
