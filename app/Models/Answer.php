<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    //Answer tablosunda timestamps kullanılmayacak
    public $timestamps = false;

    protected $fillable=['user_id','question_id','answer'];
}
