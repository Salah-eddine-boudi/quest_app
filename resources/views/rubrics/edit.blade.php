<!-- resources/views/rubrics/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Modifier Rubrique')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Modifier Rubrique</h1>

        <form action="{{ route('rubrics.update', $rubric) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Nom de la Rubrique</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $rubric->name }}" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
@endsection
