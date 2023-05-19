<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_at', 'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Orderinternal()
    {
        return $this->belongsTo('App\Models\Orderinternal');
    }
}
