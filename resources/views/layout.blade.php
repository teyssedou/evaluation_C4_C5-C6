<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" />

        <title>Epicerie Simplon</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

      
    </head>
     <body>


{{-- Navbar --}}
<section class="hero"  id="nav-content">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand has-dropdown">

                    {{-- Navbar burger appearing in mobile mode --}}
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                
                {{-- Menu --}}
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">

                        {{-- Open the "Home" page --}}                       
                        <span class="navbar-item">
                                    <a href="/" class="button is-outlined {{ request()->is('welcome') ? 'is-dark is-active' : '' }}">Accueil</a>
                                </span>

                                 {{-- Open the "statistic" page --}}
                                <span class="navbar-item">
                                    <a href="/statistic" class="button is-outlined {{ request()->is('statistic') ? 'is-dark is-active' : '' }}">Statistique</a>
                                </span>

                                {{-- Open the "historic" page --}}
                                <span class="navbar-item">
                                    <a href="/historic" class="button is-outlined {{ request()->is('historic') ? 'is-dark is-active' : '' }}">Historique</a>
                                </span>

                                {{-- Open the "historic" page --}}
                                <span class="navbar-item">
                                    <a href="/saisie-mouvement" class="button is-outlined {{ request()->is('saisie-mouvement') ? 'is-dark is-active' : '' }}">Saisie de mouvement</a>
                                </span>

                                {{-- Open the "Search" page in client mode --}}
                                <span class="navbar-item" role="navigation" aria-label="dropdown navigation">
                                    <div class="navbar-item has-dropdown is-hoverable">
                                        <a class="button navbar-link is-outlined {{ request()->is('/Search/searchMessage') ? 'is-dark is-active' : '' }}">
                                        Articles
                                        </a>

                                    <div class="navbar-dropdown">
                                
                                        <a href="/list-articles" class="navbar-item">
                                        Liste des Articles
                                        </a>
                            
                                        <a href="/create-article" class="navbar-item">
                                        Création d'Articles
                                        </a>
                                       
                                    </div>
                                </div>      
                            </span>
                   
                  
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    {{-- -------------------------------------------------------------------------- --}}
    {{-- Header message --}}
    <div class="container has-text-centered">          
        <div class="column is-6 is-offset-3 mobilTitle">
            <h1 class="title is-1">
                Épicerie Simplon
            </h1>
        </div>
    </div>
<div class="content">
            <div class="section has-text-centered">
            @include('flash::message')
            </div>
            @yield('contenu')
        </div>
</section>
 @yield ('script')
    </body>
</html>
