<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchcolor extends Model
{
    use HasFactory;
    protected $fillable=['id','name'];
    public function watch(){
        return $this->belongsToMany(Watch::class,'watch_tag_colors');
    }
}
