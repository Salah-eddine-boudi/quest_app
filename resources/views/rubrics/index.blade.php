@extends('layouts.app')

@section('title', 'Rubriques')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Rubriques</h1>
        
        <!-- Bouton pour ajouter une rubrique -->
        <div class="mb-4">
            <a href="{{ route('rubrics.create') }}" class="btn btn-success">Ajouter une rubrique</a>
        </div>

        <!-- Affichage des rubriques -->
        @foreach ($rubrics as $rubric)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">{{ $rubric->name }}</h4>
                    <div class="btn-group">
                        <a href="{{ route('rubrics.edit', $rubric) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('rubrics.destroy', $rubric) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Affichage des questions pour la rubrique -->
                    @forelse ($rubric->questions as $question)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">{{ $question->title }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $question->content }}</p>
                                
                                <!-- Affichage des réponses pour la question -->
                                @forelse ($question->answers as $answer)
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <p class="card-text">{{ $answer->content }}</p>
                                        </div>
                                        <div class="card-footer text-muted">
                                            Répondu par {{ $answer->user->name }} le {{ $answer->created_at->format('d/m/Y H:i') }}
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">Aucune réponse pour cette question.</p>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Aucune question pour cette rubrique.</p>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
@endsection
