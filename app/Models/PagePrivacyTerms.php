<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePrivacyTerms extends Model
{
    use HasFactory;
    protected $fillable = [
        'privacy_title',
        'privacy_detail',
        'privacy_status',
        'terms_title',
        'terms_detail',
        'terms_status',
    ];
}
