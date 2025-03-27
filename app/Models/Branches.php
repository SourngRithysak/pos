<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    protected $table = 'tbl_branches'; 

    protected $fillable = ['name', 'address', 'city', 'country', 'description', 'status'];

    public function contacts()
    {
        return $this->hasMany(BranchesContact::class, 'branches_id');
    }
}
