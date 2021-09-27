<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontpage extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = [
        'is_cybersec_one',
        'is_cybersec_two',
        'title',
        'slug',
        'content',
    ];
}
