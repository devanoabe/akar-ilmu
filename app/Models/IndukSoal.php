<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndukSoal extends Model
{
    use HasFactory;
    protected $table = 'induksoals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'idInduk', 
        'cerita'
    ];

}
