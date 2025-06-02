<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'blog_categories';

    protected $fillable = ['name', 'slug', 'featured', 'description'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
