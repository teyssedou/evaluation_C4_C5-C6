<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 'category_id', 'unit_id', 'sales_price',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
