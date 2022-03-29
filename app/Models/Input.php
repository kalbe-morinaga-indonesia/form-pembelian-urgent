<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $table = "minputs";

    protected $guarded = [];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";
}
