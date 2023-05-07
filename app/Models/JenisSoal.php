<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSoal extends Model
{
    use HasFactory;
    protected $table = 'jenissoals';
    public $timestamps= false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'idJenis', 
        'jenis'
    ];

}
