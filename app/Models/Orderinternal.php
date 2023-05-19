<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderinternal extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderitems()
    {
        return $this->hasMany('App\Models\Oderitem');

    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }
    
}
