@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rubrique: {{ $rubric->name }}</h1>
    
    <!-- Affichage des détails de la rubrique -->
    <p>ID: {{ $rubric->id }}</p>
    <p>Nom: {{ $rubric->name }}</p>

    <!-- Liste des questions associées -->
    <h2>Questions</h2>
    <ul>
        @foreach($rubric->questions as $question)
            <li>{{ $question->title }}: {{ $question->content }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('rubrics.index') }}" class="btn btn-primary">Retour à la liste des rubriques</a>
</div>
@endsection
