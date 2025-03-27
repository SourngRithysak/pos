<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchesContact extends Model
{
    use HasFactory;

    protected $table = 'tbl_branches_contact'; 

    protected $fillable = ['branches_id', 'contact_name	', 'contact_title', 'contact_number'];

    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branches_id');
    }
}
