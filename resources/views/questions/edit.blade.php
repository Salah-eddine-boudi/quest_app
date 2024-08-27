@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Éditer la Question</h1>

        <form action="{{ route('questions.update', $question) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" value="{{ $question->title }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                <textarea id="content" name="content" class="mt-1 block w-full" required>{{ $question->content }}</textarea>
            </div>

            <div class="mb-4">
                <label for="rubric_id" class="block text-sm font-medium text-gray-700">Rubrique</label>
                <select id="rubric_id" name="rubric_id" class="mt-1 block w-full" required>
                    @foreach ($rubrics as $rubric)
                        <option value="{{ $rubric->id }}" {{ $rubric->id == $question->rubric_id ? 'selected' : '' }}>
                            {{ $rubric->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
@endsection
