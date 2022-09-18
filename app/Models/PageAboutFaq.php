<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAboutFaq extends Model
{
    use HasFactory;
    protected $fillable =[
        'about_title',
        'about_detail',
        'about_top_status',
        'about_status',
        'faq_title',
        'faq_detail',
        'faq_status'
    ];
}
