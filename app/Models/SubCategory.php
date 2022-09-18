<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 //   use for sulg 
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends Model
{
    use HasFactory;

    use Sluggable; 
    public function rCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function rPosts()
    {
        return $this->hasMany(Post::class, 'sub_category_id', 'id');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'subcategory', 
                // 'source' => 'address'    
                
            ]
        ];
    }
}
