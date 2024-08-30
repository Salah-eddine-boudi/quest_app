@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Bienvenue sur la page d'accueil | <span class="bolder">GYA BITTI</span></h1>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">À propos de ce projet</h2>
            <p class="card-text">
                Ce projet est une application web de gestion de questions et de réponses, développée en utilisant le framework Laravel.
                Il permet aux utilisateurs de poser des questions, d'y répondre, et de gérer efficacement les rubriques associées. 
                Les fonctionnalités principales incluent la création, la mise à jour, la suppression, et la visualisation des questions et des réponses.
            </p>
        </div>
    </div>

    <!-- Fonctionnalités du projet -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Questions</h3>
                    <p class="card-text">
                        Ajoutez, modifiez et supprimez des questions. Chaque question peut être classée sous une rubrique spécifique pour une meilleure organisation.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Réponses</h3>
                    <p class="card-text">
                        Ajoutez, modifiez et supprimez des réponses. Chaque réponse est liée à une question spécifique, permettant ainsi une gestion claire des discussions.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Interface Utilisateur Moderne</h3>
                    <p class="card-text">
                        L'interface utilisateur est conçue avec Bootstrap pour offrir une expérience utilisateur fluide et responsive, adaptée à tous les appareils.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies utilisées -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Technologies Utilisées</h2>
            <p class="card-text">
                Ce projet utilise les technologies suivantes :
            </p>
            <ul>
                <li><strong>Laravel:</strong> Pour la structure et le développement backend.</li>
                <li><strong>Bootstrap:</strong> Pour la création d'une interface utilisateur responsive et moderne.</li>
                <li><strong>MySQL:</strong> Comme système de gestion de base de données pour stocker les informations sur les questions et les réponses.</li>
                <li><strong>JavaScript & jQuery:</strong> Pour améliorer l'interactivité de l'application.</li>
            </ul>
        </div>
    </div>

    <!-- Appel à l'action pour explorer l'application -->
    <div class="text-center mt-4">
        <a href="{{ route('questions.index') }}" class="btn btn-primary mx-2">
            <i class="fas fa-question"> Explorer les Questions</i> 
        </a>
        <a href="{{ route('answers.index') }}" class="btn btn-secondary mx-2">
            <i class="fas fa-reply"> Voir les Réponses </i> 
        </a>
    </div>
</div>
@endsection
