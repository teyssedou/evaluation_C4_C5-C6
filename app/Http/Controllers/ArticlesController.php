<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Movement;
use App\Unit;

class ArticlesController extends Controller
{
    // /* --- To show the list of articles in 'List-articles' Page --- */
    public function list()
    {
        $articles = Article::all();
        $categories = Category::all();
        $units = Unit::all();

        return view('/list-articles', [
            'articles' => $articles,
            'categories' => $categories,
            'units' => $units,
        ]);
    }

    // /* --- To show the category and unit in a select in 'create-article' Page --- */
    public function showCreate()
    {
        $categories = Category::all();
        $units = Unit::all();

        return view('create-article', [
            'categories' => $categories,
            'units' => $units,
        ]);
    }

    // /* --- To create a new article in 'create-articles' Page --- */
    public function create()
    {
        request()->validate([
            'name' => ['required'],
            'sales_price' => ['required'],
        ]);

        $article = Article::create([
            'name' => request('name'),
            'category_id' => request('category_id'),
            'unit_id' => request('unit_id'),
            'sales_price' => request('sales_price'),
        ]);

        return redirect('/list-articles');
    }

    // /* --- To fill in all the fields corresponding to the id of the chosen article in 'Modify-article' Page --- */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        $categories = Category::all();
        $listCategory = Article::join('categories', 'categories.id', 'articles.category_id')->where('articles.id', '=', $id)->first();
        $unites = Unit::all();
        $listUnite = Article::join('units', 'units.id', 'articles.unit_id')->where('articles.id', $id)->first();

        return view('modify-article', [
            'article' => $article,
            'categories' => $categories,
            'listCategory' => $listCategory,
            'unites' => $unites,
            'listUnite' => $listUnite,
        ]);
    }

    // /* --- To update the chosen article in 'modify-article' Page --- */
    public function update($id)
    {
        $update = Article::where('id', $id)->update([
            'name' => request('updateName'),
            'category_id' => request('updateCategory_id'),
            'unit_id' => request('updateUnit_id'),
            'sales_price' => request('updateSales_price'), ]);

        flash("La modification de l'article a bien été prise en compte!")->success();

        return redirect('/list-articles');
    }

    // /* --- To delete a chosen article in 'list-articles' Page --- */
    public function delete($id)
    {
        $resultat = Movement::where('article_id', $id)->first();
        if ($resultat) {
            flash("L'article ne peut pas être supprimé!")->error();
        } else {
            Article::where('id', $id)->delete();
            flash("L'article a bien été supprimé!")->success();
        }

        return redirect('/list-articles');
    }
}
