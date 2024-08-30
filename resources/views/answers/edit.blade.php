@extends('layouts.app')

@section('title', 'Edit | Réponse ')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Réponse</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-5">
        <h1 class="mb-4">Modifier la Réponse</h1>

        <!-- Formulaire pour modifier la réponse -->
        <form action="{{ route('answers.update', $answer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Réponse :</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $answer->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('answers.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @endsection
