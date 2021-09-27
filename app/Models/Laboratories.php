<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratories extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'laboratories';
    protected $fillable = [
        'title',
        'slug',
    ];
}
