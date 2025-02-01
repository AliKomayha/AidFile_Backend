<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'Beneficiary_ID', 'name', 'place_of_birth', 'date_of_birth',
        'religious_commitment', 'sex', 'resident_in_house',
        'academic_level', 'continues_studying', 'yearly_installment',
        'type_of_work', 'monthly_income', 'monthly_contribution',
        'health_status', 'guarantor', 'blood_type'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID', 'id');
    }
}
