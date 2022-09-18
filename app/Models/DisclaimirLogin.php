<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisclaimirLogin extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'disclaimir_title',
        'disclaimir_detail',
        'disclaimir_status', 
        'contact_title',
        'contact_detail',
        'contact_map', 
        'contact_status',
        'login_title',
        'login_detail',
        'login_status',
    ];
}
