<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = ['title','content','published','notifications', 'photo_path'];
    protected $casts = [
        'published' => 'boolean',
        'notifications' => 'array'
    ];
    protected static function booted()
    {
        static::updated(function ($article) {
            if ($article->wasChanged('published')) {
                cache()->forget('published-count');
            }
            
        });
        static::created(function ($article) {
            if ($article->published == 1) { 
                cache()->forget('published-count'); 
            }
        });
        static::deleted(function () {
            cache()->forget('published-count'); 
        });
    }
}
