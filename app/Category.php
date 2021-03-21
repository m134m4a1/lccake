<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";
    public $timestamps = false;
    public function listcake()
    {
        return $this->hasMany(Listcake::class, 'category_id', 'id');
    }
}
