<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'sku_id',
        'user_id',
        'body',
        'created_at',
        'updated_at'
    ];

    public function sku() {

        return $this->belongsTo('\App\Sku', 'sku_id', 'id');
    }
    public function tone()
    {
        return $this->hasOne('\App\Tone', 'comment_id', 'id');
    }
}
