@extends('layout')
   
@section('contenu')

<section class="section">
    <div class="title is-1 has-text-centered">
        Statistiques
    </div>
<section class="section info-tiles">
    <div class="tile is-ancestor has-text-centered" id="listArticle">
        {{-- Box to display the total value of stock --}}
        <article class="tile is-child box">
            <p class="title">Valeur totale du stock</p>
            <p class="column is-size-5">{{ $total->total_value }}</p>
        </article> 
                   
        {{-- Box to display the value by category of stock --}}
        <article class="tile is-child box">    
            <p class="title">Valeur par catégorie</p>
            @foreach($categoryValue as $categories)
            <p class="column is-size-5">{{ $categories->category }} : {{ $categories->total_value }}</p>
            @endforeach
        </article>
    </div>
</section>
@endsection