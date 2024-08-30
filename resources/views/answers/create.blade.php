@extends('layouts.app')

@section('title', 'Répondre à une Question')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: hsl(210, 11%, 86%);
        }
        .container {
            max-width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-group {
            display: flex;
            justify-content: center;
        }
        .form-group label {
            font-weight: bold;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>

    <div class="container mt-5 p-4 bg-white shadow rounded-lg">
        <h1 class="text-center mb-4">Répondre à la Question</h1>
        
        <!-- Question Title and Content -->
        <div class="mb-4 border p-3 rounded">
            <h2 class="text-xl font-bold mb-2">{{ $question->title }}</h2>
            <p class="text-gray-700">{{ $question->content }}</p>
        </div>

        <!-- Response Form -->
        <form action="{{ route('answers.store', $question->id) }}" method="POST">
            @csrf

            <!-- Response Content -->
            <div class="form-group mb-4">
                <label for="content" class="form-label">Réponse:</label>
                <textarea id="content" name="content" class="form-control" rows="5" placeholder="Écrivez votre réponse ici..." required></textarea>
                @error('content')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
