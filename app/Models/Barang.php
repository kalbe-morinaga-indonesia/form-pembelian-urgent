<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "mbarangs";

    protected $guarded = [];

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";

    public function purchase()
    {
        return $this->belongsTo("App\Models\Purchase", 'mpurchase_id');
    }

    public function uom()
    {
        return $this->belongsTo("App\Models\Uom", 'muom_id');
    }

    public function inputs()
    {
        return $this->hasOne('App\Models\Input', 'mbarang_id');
    }
}
