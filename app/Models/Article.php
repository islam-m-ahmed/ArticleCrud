<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title','image','description'];

    public function category(){
        return $this->belongsTo(Post::class,'category_id');
    }
}
