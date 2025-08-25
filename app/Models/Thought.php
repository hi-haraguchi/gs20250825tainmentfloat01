<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thought extends Model
{
    /** @use HasFactory<\Database\Factories\ThoughtFactory> */
    use HasFactory;

    protected $fillable = ['thought'];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

}
