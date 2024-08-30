@extends('layouts.app')

@section('title', 'Questions')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for enhancing the table display */
        .container {
            max-width: 100%;
        }

        .table th, .table td {
            white-space: nowrap;
            text-align: center;
        }

        .table th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
            z-index: 10;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        .btn-sm {
            margin: 0 2px;
        }
    </style>

    <div class="container mt-1">
        <h1 class="mb-4 text-center">Liste des Questions</h1>
        <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Ajouter une Question</a>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    
                    <th>Rubric</th>
                    <th>utilisateur</th>
                    <th>Question</th>
                    <th>Date de Création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        
                        <td>{{ $question->rubric ? $question->rubric->name : 'Non spécifié' }}</td>
                        <td>{{ $question->user ? $question->user->name : 'Non spécifié' }}</td>
                        <td>{{ $question->content }}</td>
                        <td>{{ $question->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('questions.show', $question) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection