<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'idSoal',  
        'soal',
        'explaination', 
        'created_at', 
        'created_at'
    ];

    public function answers(){
        return $this->hasMany(Answer::class, 'questions_id','id');
    }

}
