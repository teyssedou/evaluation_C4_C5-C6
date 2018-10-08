@extends('layout')
   
@section('contenu')

<section class="section">
    <div class="title m-b-md">
        Statistiques
    </div>
<section class="section info-tiles">
    <div class="tile is-ancestor has-text-centered" id="listArticle">
        <div class="oneArticle">
            <article class="tile is-child box">
                <p class="title">Valeur totale du stock</p>
                <p class="column">{{ $total->total_value }}</p>
            </article>

            <article class="tile is-child box">    
                <p class="title">Valeur par catégorie</p>
                @foreach($categoryValue as $categories)
                <p class="column">{{ $categories->category }} : {{ $categories->total_value }}</p>
                @endforeach
            </article>
        </div>
    </div>
</section>
@endsection