<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
    use HasFactory;


    protected $fillable = [
        'Beneficiary_ID', 'full_name', 'place_of_birth', 'date_of_birth',
        'religious_commitment', 'doctrine', 'lineage', 'academic_level',
        'type_of_work', 'monthly_income', 'health_status', 'guarantor',
        'blood_type', 'property_type', 'property_value'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID', 'id');
    }
}
