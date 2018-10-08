@extends('layout')
   
@section('contenu')

<section class="section">
    <div class="content">
        <div class="title is-1 has-text-centered">
            Historique
        </div>

        <div class="is-centered section">
            <table class="table is-bordered">
                <thead>
                    <tr>
                        <th class="has-text-centered is-uppercase is-size-6">Nom de l'article</th>
                        <th class="has-text-centered is-uppercase is-size-6">Quantité</th>
                        <th class="has-text-centered is-uppercase is-size-6">Date</th>
                        <th class="has-text-centered is-uppercase is-size-6">Type de mouvement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mouvements as $mouvement)
                    <tr>
                        <td class="has-text-centered">{{ $mouvement->articleName }}</td>
                        <td class="has-text-centered">{{ $mouvement->quantity }}</td>
                        <td class="has-text-centered">{{ date('d/m/Y H:i:s', strtotime($mouvement->date_time)) }}</td>
                        <td class="has-text-centered">{{ $mouvement->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection