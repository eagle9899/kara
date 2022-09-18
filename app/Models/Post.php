<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//   use for sulg 
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory; 
    use Sluggable; 
    protected $table = 'posts';
    public $fillable = [
        'title',
        'slug',
        'description', 
        'bedroom',
        'rooms',
        'bathrooms', 
        'space',
        'rate',
        'currency',
        'phone',
        'address',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'garage',
        'visitors',
        'sub_category_id',
        'category_id',
        'publish',
        'city',
        'target',
        'reason',
        'admin_id',
        'user_id',
    ];

    public function rCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    } 
    public function rSubcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class, 'post_id', 'id');
    }
     
    public function rPostimage()
    {
        return $this->hasMany(PostImage::class);
    }
   
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title', 
                // 'source' => 'address'    
                
            ]
        ];
    }
}
