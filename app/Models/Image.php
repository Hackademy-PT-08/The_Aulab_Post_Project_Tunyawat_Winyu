<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'image_id'
    ];

    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
