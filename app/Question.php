<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lecturize\Tags\Traits\HasTags;

class Question extends Model
{
    use HasTags;


    protected $fillable = ['question'];

    
}
