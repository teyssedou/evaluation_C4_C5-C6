@extends('layout')
   
@section('contenu')

<section class="section">
  <div class="title m-b-md">
    Liste des articles
  </div>

  <div class="hero">
    <a class="button is-primary is-rounded" href="/create-article">Créer un nouvel article</a>
  </div>
        
  <section class="section info-tiles">
    <div class="tile is-ancestor has-text-centered" id="listArticle">
        @foreach($articles as $article)
        <div class="oneArticle">
            <article class="tile is-child box">
                <p class="title">{{ $article->name }}</p>
                <p class="column">

                    <ins>Catégorie:</ins><br />
                    @foreach ($categories as $category)
                        @if ($category->id == $article->category_id)
                            <b class="title is-4">{{ $category->name }}</b><br />
                        @endif
                    @endforeach

                    <ins>Unité de mesure:</ins><br />
                    @foreach ($units as $unit)
                        @if ($unit->id == $article->unit_id)
                            <b class="title is-4">{{ $unit->name }}</b><br />
                        @endif
                    @endforeach
                  
                    <ins>Prix de Vente:</ins><br />
                    <b class="title is-4">{{ $article->sales_price }} Euros</b>
                </p>
            
                <div class="box has-text-centered">
                    <form action="/modify-article/{{ $article->id }}" method="get">
                    @csrf
                        <button class="button is-link" value='{{ $article->id }}' name="updateArticle" type="submit">Modifier</button>
                     </form>
               

                    
                    <form class="supprimer" action="/delete/{{ $article->id }}" method="POST">
                        <input type="hidden" name="_method" value="Delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                       @csrf
                        <input type="submit" class='button is-danger is-rounded' value="Supprimer"> 
                    </form>
                
                </div>    
    </article>
</div>
@endforeach
    </div>
</section>   
@endsection

@section('script')
<script>
    /* --- Alert box to confirm the deletion --- */
    $(".supprimer").on("click", function(){
        return confirm("Êtes-vous sûr de supprimer cet article?");
    });    
</script> 
@endsection