<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    protected $fillable = ['Beneficiary_ID', 'property_type', 'property_value'];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID', 'id');
    }
}
