<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ['id','Name', 'Age', 'MSSV'];
}
