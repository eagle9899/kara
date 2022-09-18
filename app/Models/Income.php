<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable =[
        'amount',
        'currency',
        'user_id',
        'admin_id',
        'post_id',
    ];
}
