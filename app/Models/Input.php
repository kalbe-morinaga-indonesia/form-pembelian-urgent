<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;

    protected $table = "minputs";

    protected $guarded = [];

    public function mbarang()
    {
        return $this->belongsTo('App\Models\Barang');
    }

    public function getAmountAttribute(){
        return $this->attributes['intHarga'] * $this->mbarang->attributes['intJumlah'];
    }

    const CREATED_AT = "dtmInsertedBy";
    const UPDATED_AT = "dtmUpdatedBy";
}
