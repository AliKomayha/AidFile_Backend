<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['Beneficiary_ID', 'job_type', 'contract_type', 'monthly_income'];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID', 'id');
    }
}
