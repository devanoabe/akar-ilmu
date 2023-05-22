<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataPelajaran;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'exam_name',
        'subject_id',
        'date',
        'keterangan',
        'time',
    ];

    public function subjects()
    {
        return $this->hasMany(MataPelajaran::class,'id','subject_id');
    }

    public function getQnaExam()
    {
        return $this->hasMany(QnaExam::class,'exam_id','id');
    }
}
