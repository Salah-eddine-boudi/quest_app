@extends('layouts.app')

@section('title', 'Réponses')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-custom {
            width: 100%;
            margin: 0 auto;
            overflow-x: auto;
        }

        .table th, .table td {
            white-space: nowrap;
            text-align: center;
        }

        .btn-group .btn {
            margin-right: 5px;
        }

        .thead-light th {
            background-color: #f8f9fa;
            color: #495057;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            max-width: 100%;
        }
    </style>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Liste des Réponses</h1>

        <!-- Table des réponses -->
        <div class="table-responsive mb-5">
            <table class="table table-bordered table-hover table-custom">
                <thead class="thead-light">
                    <tr>
                        
                        <th>Rubrique</th>
                        <th>utilisateur</th>
                        <th>Question</th>
                       
                        <th>Réponse</th>
                        <th>Date de Création</th>
                        <th>Date de Réponse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($answers as $answer)
                        <tr>
                           
                            <td>{{ $answer->question->rubric ? $answer->question->rubric->name : 'Non spécifié' }}</td>
                        <td>{{ $answer->user ? $answer->user->name : 'Non spécifié' }}</td>
                            <td>{{ $answer->question->content }}</td>
                            <td>{{ $answer->content }}</td>
                            <td>{{ $answer->question->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $answer->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                   
                                    <a href="{{ route('answers.edit', $answer) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('answers.destroy', $answer) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucune réponse disponible</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Table des questions sans réponses -->
        <h2 class="mb-4 text-center">Questions Sans Réponses</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-custom">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($questionsWithoutAnswers as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->title }}</td>
                            <td>{{ $question->content }}</td>
                            <td>{{ $question->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('answers.create', ['question' => $question->id]) }}" class="btn btn-info btn-sm">Répondre</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Toutes les questions ont des réponses</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
