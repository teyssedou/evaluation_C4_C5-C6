<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
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
