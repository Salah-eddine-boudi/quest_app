@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Éditer la Rubrique</h1>

        <form action="{{ route('rubrics.update', $rubric->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom de la Rubrique</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full" value="{{ $rubric->name }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        </form>
    </div>
@endsection
