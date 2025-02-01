<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidDistribution extends Model
{
    use HasFactory;


    protected $fillable = [
        'Aid_ID', 'Beneficiary_ID', 'date_given',
        'unit_value', 'amount', 'total_value'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID','id');
    }

    public function aid()
    {
        return $this->belongsTo(Aid::class, 'Aid_ID', 'id');
    }
}
