@extends('layouts.app')

@section('title', 'Créer une Question')

@section('content')
<h1 class="text-2xl font-bold mb-4">Créer une Question</h1>

<form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" id="title" name="title" class="form-control mt-1" required>
    </div>

    <div class="mb-4">
        <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
        <textarea id="content" name="content" class="form-control mt-1" rows="5" required></textarea>
    </div>

    <div class="mb-4">
        <label for="rubric_id" class="block text-sm font-medium text-gray-700">Rubrique</label>
        <select id="rubric_id" name="rubric_id" class="form-control mt-1" required>
            @foreach ($rubrics as $rubric)
                <option value="{{ $rubric->id }}">{{ $rubric->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection
