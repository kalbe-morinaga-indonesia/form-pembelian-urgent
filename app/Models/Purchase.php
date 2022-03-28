<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = "mpurchases";

    protected $guarded = [];
    protected $primaryKey = 'id';

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";

    public function muser()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function mdepartment()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function mbarangs()
    {
        return $this->hasMany('App\Models\Barang', 'mpurchase_id');
    }
}
