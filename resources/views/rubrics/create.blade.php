<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Rubrique</title>
   
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Your custom CSS if needed -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Créer une Rubrique</h1>
        <form action="{{ route('rubrics.store') }}" method="POST">
            @csrf

            <!-- Nom de la Rubrique -->
            <div class="form-group">
                <label for="name">Nom de la Rubrique:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Entrez le nom de la rubrique" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
