<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdepartments extends Model
{
    use HasFactory;
    protected $table = 'msubdeparments';
    protected $guarded = [];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";

    public function department(){
        return $this->belongsTo('App\Models\Department','txtIdDept','txtIdDept');
    }
}
