@extends('layout')
   
@section('contenu')
<div class="title m-b-md section has-text-centered is-size-1">
    Création d'un article
</div>

<form action="/create-article" method="post" class="section">
    @csrf
    <div class="field">
        <label class="label">Nom</label>
        <div class="control">
            <input class="input is-rounded" type="text" name="name" placeholder="Entrez un nom...">
            @if ($errors->has('name'))
                <p class="help is-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
    </div>

    <div class="field">
                <label class="label">Choix de la catégorie</label>
                <div class="control">
                    <div class="select">
                        <select class="input is-rounded" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

    <div class="field"> 
        <label class="label">Choix de l'unité de mesure</label>
        <div class="control">
            <div class="select">
                <select class="input is-rounded" name="unit_id" id="unit_id">
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"> {{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>            
        </div>
    </div>

    <div class="field">
        <label class="label">Prix de vente</label>
        <div class="control">
            <input class="input is-rounded" type="number" name="sales_price" placeholder="Entrez une valeur">
            @if ($errors->has('sales_price'))
                <p class="help is-danger">{{ $errors->first('sales_price') }}</p>
            @endif
        </div>
    </div>

    <div class="field">
        <p class="control">
            <button type="submit" class="button is-success">
            Créer
            </button>
        </p>
    </div>
</form>
@endsection