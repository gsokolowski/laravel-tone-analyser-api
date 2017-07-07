<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{

    protected $fillable = [
        'code',
        'name',
        'created_at',
        'updated_at'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'sku_id', 'id');
    }
}
