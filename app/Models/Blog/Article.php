<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'blog_articles';

    protected $fillable = ['title', 'content', 'slug', 'featured', 'isActive', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
