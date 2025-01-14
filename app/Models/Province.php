<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable=[
        "name",
        "name_second_lang",
        "user_id",
    ];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
