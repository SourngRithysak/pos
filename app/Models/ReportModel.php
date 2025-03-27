<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_sale';

    protected $fillable = [
        'name', 'address', 'city', 'country', 'description', 'status'
    ];
}
