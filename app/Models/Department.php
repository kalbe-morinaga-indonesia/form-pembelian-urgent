<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = "mdepartments";
    protected $guarded = [];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function divisi(){
        return $this->belongsTo('App\Models\Divisi','txtIdDivisi','txtIdDivisi');
    }
}
