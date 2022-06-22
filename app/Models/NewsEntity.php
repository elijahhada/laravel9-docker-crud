<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEntity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'body',
        'image',
        'publication_date',
        'is_published',
    ];
}
