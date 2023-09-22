<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'subtitle',
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
