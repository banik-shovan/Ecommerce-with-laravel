<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug', 'created_at', 'updated_at'
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }
    public function volumes()
    {
        return $this->belongsToMany('App\Models\Volume')->withPivot('qty', 'price')->withTimestamps();
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
    public function submenu()
    {
        return $this->belongsTo('App\Models\Submenu');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
