<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'tbl_unit'; 

    protected $fillable = ['unit_name', 'description', 'status'];
}
