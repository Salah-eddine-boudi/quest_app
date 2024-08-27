@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Créer une Question</h1>

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea id="content" name="content" class="mt-1 block w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="rubric_id" class="block text-sm font-medium text-gray-700">Rubrique</label>
                <select id="rubric_id" name="rubric_id" class="mt-1 block w-full" required>
                    @foreach ($rubrics as $rubric)
                        <option value="{{ $rubric->id }}">{{ $rubric->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
        </form>
    </div>
@endsection
