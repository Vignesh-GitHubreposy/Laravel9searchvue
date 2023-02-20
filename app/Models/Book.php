<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'title', 'author', 'genre', 'description', 'isbn', 'image', 'published', 'publisher'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
