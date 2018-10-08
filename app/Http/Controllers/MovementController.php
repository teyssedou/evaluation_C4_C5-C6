<?php

namespace App\Http\Controllers;

use App\Article;
use App\Direction;
use App\Movement;
use App\Movement_type;

class MovementController extends Controller
{
    // To show the list of movement in "historic" Page
    public function list()
    {
        $mouvements = Movement::join('articles', 'movements.article_id', '=', 'articles.id')
            ->join('movement_types', 'movement_types.id', '=', 'movements.movement_type_id')
            ->select('articles.name as articleName', 'movements.quantity', 'movements.date_time', 'movement_types.name')
            ->orderBy('date_time')
            ->get();

        return view('historic', [
            'mouvements' => $mouvements,
        ]);
    }

    // Filled each select field in "saisie-mouvement" Page
    public function view()
    {
        $articles = Article::all();
        $movements_type = Movement_type::all();
        $directions = Direction::all();

        return view('saisie-mouvement', [
            'articles' => $articles,
            'movement_types' => $movements_type,
            'directions' => $directions,
        ]);
    }

    // Create a new Movement in "saisie-mouvement" Page
    public function create()
    {
        $movements = new Movement();
        $movements->quantity = request('quantite');
        $movements->article_id = request('article');
        $movements->movement_type_id = request('type');
        $movements->save();

        return redirect('/historic');
    }
}
