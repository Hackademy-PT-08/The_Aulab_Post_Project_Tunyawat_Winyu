<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'subtitle'
    ];

    // One to many Relationship with User
        public function user(){
            return $this->belongsTo(User::class);
        }

    // Many to many relationship with Images
        public function images(){
            return $this->belongsToMany(Image::class);
        }
        
    // Many to many relationship with Categories
        public function categories(){
            return $this->belongsToMany(Categorie::class);
        }

}
