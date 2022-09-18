<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory;
    use Sluggable; 
    public function rposts()
    {
        return $this->hasMany(Post::class ,'category_id', 'id');
    }
    // public function rCategory()
    // {
    //     return $this->hasMany(Post::class ,'category_id', 'id');
    // }
    public function rpost()
    {
        return $this->hasOne(Post::class ,'house_id');
    }
        // public function rposts()
    // {
    //     return $this->hasMany(House::class ,'sub_category_id', 'id');
    // }
    public function sluggable(): array
    {
        return [
            'slugs' => [
                'source' => 'category',  
            ]
        ];
    }
}
