<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionOption;

class TestQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
      
    ]; 

    public function options() 
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }
}
