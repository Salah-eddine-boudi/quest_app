<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <!-- Ajouter le lien vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Questions</h1>
        
        <!-- Lien pour ajouter une nouvelle question -->
        <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Ajouter une question</a>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Liste des questions -->
        <ul class="list-group">
            @foreach($questions as $question)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a>
                    <div>
                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
