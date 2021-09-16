<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'firsname',
        'lastname',
        'email',
        'password',
        'status',
        'role'
    ];

    public $table = 'posts';
}
