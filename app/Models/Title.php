<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    /** @use HasFactory<\Database\Factories\TitleFactory> */
    use HasFactory;

    protected $fillable = ['title'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function thoughts()
    {
        return $this->hasMany(Thought::class);
    }


}
