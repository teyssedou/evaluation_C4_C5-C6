@extends('layout')
   
@section('contenu')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md section has-text-centered is-size-1">
            Modification de l'article <b>{{ $article->name }}</b>
        </div>
                
        <form method="post" action='/modify-article/{{ $article->id }}' class="section">
        @csrf
            <div class="field">
                <label class="label">Nom</label>
                <div class="control">
                    <input type="text" name="updateName" class="input is-rounded" value="{{ $article->name }}">
                </div>
            </div>
            
            <div class="field">
                <label class="label">Choix de la catégorie</label>
                <div class="control">
                    <div class="select">
                        <select class="input is-rounded" name="updateCategory_id" id="updateCategory_id">
                            @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                        
            <div class="field"> 
                <label class="label">Choix de l'unité de mesure</label>
                <div class="control">
                    <div class="select">
                        <select class="form-control" name="updateUnit_id" id="updateUnit_id">
                            @foreach($unites as $unite)
                                <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                
            <div class="field">
                <label class="label">Prix de vente</label>
                <input type="number" name="updateSales_price" class="input is-rounded" id="updateSales_price" placeholder="Entrez une valeur" value="{{ $article->sales_price }}">
            </div>
                
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-success">
                        Modifier
                    </button>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection