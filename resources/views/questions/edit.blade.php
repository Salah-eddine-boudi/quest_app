@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 max-w-4xl">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Éditer la Question</h1>

        <form action="{{ route('questions.update', $question) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-lg font-medium text-gray-700">Titre</label>
                <input type="text" id="title" name="title" value="{{ old('title', $question->title) }}" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-lg font-medium text-gray-700">Contenu</label>
                <textarea id="content" name="content" rows="4" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>{{ old('content', $question->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="rubric_id" class="block text-lg font-medium text-gray-700">Rubrique</label>
                <select id="rubric_id" name="rubric_id" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>
                    <option value="" disabled selected>Select a Rubric</option>
                    @foreach ($rubrics as $rubric)
                        <option value="{{ $rubric->id }}" {{ $rubric->id == $question->rubric_id ? 'selected' : '' }}>
                            {{ $rubric->name }}
                        </option>
                    @endforeach
                </select>
                @error('rubric_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Mettre à jour</button>
        </form>
    </div>
@endsection
