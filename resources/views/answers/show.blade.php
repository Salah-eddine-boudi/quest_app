@extends('layouts.app')

@section('title', 'Détails de la Réponse')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @extends('layouts.app')

    @section('title', 'Détails de la Réponse')
    
    @section('content')
        <div class="container mt-5">
            <h1 class="mb-4">Détails de la Réponse</h1>
    
            <div class="card">
                <div class="card-header">
                    Réponse ID: {{ $answer->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rubrique: {{ $answer->question->rubric->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Titre de la Question: {{ $answer->question->title }}</h6>
                    <p class="card-text"><strong>Contenu de la Question:</strong> {{ $answer->question->content }}</p>
                    <p class="card-text"><strong>Réponse:</strong> {{ $answer->content }}</p>
                    <p class="card-text"><strong>Date de Création:</strong> {{ $answer->question->created_at->format('d/m/Y H:i') }}</p>
                    <p class="card-text"><strong>Date de Réponse:</strong> {{ $answer->created_at->format('d/m/Y H:i') }}</p>
                    <a href="{{ route('answers.index') }}" class="btn btn-primary">Retour à la Liste</a>
                </div>
            </div>
        </div>
    @endsection
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
