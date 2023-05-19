<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oderitem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderinternal()
    {
        return $this->belongsTo('App\Models\Orderinternal');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
