<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');

        
    }

    protected $fillable=['city','country','zip','address1'];
}
