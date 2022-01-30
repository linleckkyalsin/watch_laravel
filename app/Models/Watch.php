<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    protected $fillable=['category-id','color_id','name','price','image','description','description'];
    public function category()
    {
        # code...
        return $this->belongsTo(Category::class,'category-id');
    }
    public function color()
    {
        # code...
        return $this->belongsTo(Color::class,'color_id');
    }
    public function watchcolor(){
        return $this->belongsToMany(Watchcolor::class,'watch_tag_colors');
    }
}
