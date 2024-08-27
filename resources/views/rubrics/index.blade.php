@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Détails de la Rubrique</h1>

        <p><strong>Nom :</strong> {{ $rubric->name }}</p>
        
        <!-- Ajoutez d'autres détails ici si nécessaire -->

        <a href="{{ route('rubrics.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Retour à la liste</a>
    </div>
@endsection
