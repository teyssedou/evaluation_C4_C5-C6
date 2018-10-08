@extends('layout')
   
@section('contenu')

<section class="section">
    <div class="content">
        <div class="title m-b-md">
            Saisie de Mouvement
        </div>
            
        <form method="post" action='/saisie-mouvement/create'>
        @csrf

            <div class="form-group">
                <label for="type">Type de mouvement</label>
                <select class="form-control" name="type" id="type">
                    @foreach ($movement_types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sens">Sens de mouvement</label>
                <select class="form-control" name="sens" id="sens">
                    @foreach ($directions as $direction)
                        <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                    @endforeach
                </select>
            </div>
                    
            <div class="form-group">
                <label for="article">Article</label>
                <select class="form-control" name="article" id="article">
                    @foreach ($articles as $article)
                        <option value="{{ $article->id }}">{{ $article->name }}</option>
                    @endforeach
                </select>
            </div>
                  
            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" name="quantite" class="form-control" id="quantite" placeholder="Quantité">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit">
            </div>
        </form>
        </div>
    </div>
</section>
@endsection