<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .navbar-brand {
            font-size: 1.25rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .navbar-brand:hover {
            color: #0056b3;
        }
        .nav-link {
            font-size: 0.9rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #f0f0f0;
            color: #0056b3;
        }
        .user-info {
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        .user-info span {
            display: block;
        }
        .user-avatar img {
            border-radius: 50%;
        }
        .online-status {
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #28a745;
            border-radius: 50%;
            border: 2px solid white;
        }
        footer {
            text-align: center;
            padding: 1rem 0;
            background-color: #f8f9fa;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
            color: #6c757d;
        }
        .navbar-collapse {
            justify-content: space-between;
        }
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom py-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Ma communauté</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('rubrics.index') ? 'active' : '' }}" href="{{ route('rubrics.index') }}">Rubriques</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('questions.index') ? 'active' : '' }}" href="{{ route('questions.index') }}">Questions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('answers.index') ? 'active' : '' }}" href="{{ route('answers.index') }}">Réponses</a>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Se connecter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}">S'inscrire</a>
                            </li>
                        @endguest
                    </ul>
                    
                    @auth
                        <div class="user-info text-end d-flex align-items-center">
                            <div class="me-3">
                                <span class="fw-bold">{{ Auth::user()->name }}</span>
                                <span class="text-muted small">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="user-avatar position-relative">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&size=40" 
                                     alt="Avatar" class="rounded-circle">
                                <span class="online-status position-absolute bottom-0 end-0"></span>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link btn btn-outline-danger btn-sm" href="#" onclick="event.preventDefault(); if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) { document.getElementById('logout-form').submit(); }">
                            Déconnexion
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-4">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Mon Application. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
