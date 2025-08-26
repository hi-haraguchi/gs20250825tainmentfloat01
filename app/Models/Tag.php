<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function thoughts()
    {
    return $this->hasMany(Thought::class);
    }

    protected $fillable = ['tag'];
    
}
