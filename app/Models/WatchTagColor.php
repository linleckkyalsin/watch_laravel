<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchTagColor extends Model
{
    use HasFactory;
    protected $fillable=['watchcolor_id','watch_id'];
}