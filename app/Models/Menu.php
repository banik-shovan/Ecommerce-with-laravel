<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $table = "menus";
    protected $fillable = [
        'name','description', 'created_at', 'updated_at'
    ];
    // protected $guarded=[];
    public function submenus()
    {
        return $this->hasMany('App\Models\Submenu');

    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');

    }
    
}
