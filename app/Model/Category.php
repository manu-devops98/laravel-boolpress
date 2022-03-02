<?php

namespace App\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldCategory = Category::where('slug', $slug)->first();

        $counter = 0;
        while ($oldCategory) {
            $newSlug = $slug . '-' . $counter;
            $oldCategory = Category::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }
}
