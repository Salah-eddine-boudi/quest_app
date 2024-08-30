@extends('layouts.app')

@section('title', 'Détails de la Question')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: hsl(210, 11%, 86%);
        }
        .container {
            max-width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-group {
            display: flex;
            justify-content: center;
        }
    </style>

    <div class="container mt-5 p-4 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4 text-center">Détails de la Question</h1>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Titre de la question</label>
            <p class="mt-1 text-gray-900">{{ $question->title }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Contenu de la question</label>
            <p class="mt-1 text-gray-900">{{ $question->content }}</p>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nom de la Rubrique</label>
            <p class="mt-1 text-gray-900">{{ $question->rubric->name }}</p>
        </div>

        <div class="btn-group mt-4" role="group">
            <a href="{{ route('questions.edit', $question) }}" class="btn btn-primary btn-sm">Modifier</a>
            <a href="{{ route('questions.index') }}" class="btn btn-secondary btn-sm">Retour à la Liste</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
