<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'link_name',
        'title',
        'image',
        'content',
    ];
}
