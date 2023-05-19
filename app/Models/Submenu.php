<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');

    }
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];
}
