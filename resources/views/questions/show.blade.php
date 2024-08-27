@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Détails de la Rubrique</h1>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nom de la Rubrique</label>
            <p class="mt-1 text-gray-900">{{ $rubric->name }}</p>
        </div>

        <a href="{{ route('rubrics.edit', $rubric) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Modifier</a>
        <a href="{{ route('rubrics.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Retour à la Liste</a>
    </div>
@endsection
