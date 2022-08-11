<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = "mdivisis";
    protected $fillable = ['txtIdDivisi','txtNamaDivisi'];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";
}
