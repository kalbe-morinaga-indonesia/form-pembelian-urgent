<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = "mdepartments";
    protected $fillable = ['txtNamaDept'];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
