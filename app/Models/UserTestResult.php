<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserTestResult extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "user_department_id",
        "total_questions",
        "attempted",
        "correct_answer",
        "wrong_answer",
        "total_score"
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
}
