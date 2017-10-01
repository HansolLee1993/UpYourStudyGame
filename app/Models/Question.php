<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Lecturize\Tags\Traits\HasTags;

class Question extends Model
{
    use HasTags;
    protected $table = 'questions';
    public $timestamps = true;
    protected $fillable = ['question'];
    
}
