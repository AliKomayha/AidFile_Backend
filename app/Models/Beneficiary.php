<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'father_name', 'grandfather_name', 'lastname', 
        'date_of_birth', 'mothers_name', 'social_status', 'family_situation',
        'health_status', 'number_place_of_registration', 'nationality',
        'doctrine', 'guarantor', 'political_affiliation', 'lineage',
        'academic_level', 'blood_type', 'religious_commitment',
        'phone_number', 'second_phone'
    ];

    public function housing(){
        
        return $this->hasOne(Housing::class, 'Beneficiary_ID', 'id');
    }

    public function work(){
       
        return $this->hasOne(Work::class, 'Beneficiary_ID', 'id');
    }

    public function wives(){
        
        return $this->hasMany(Wife::class, 'Beneficiary_ID', 'id');
    }

    public function children(){
        return $this->hasMany(Child::class, 'Beneficiary_ID', 'id');

    }

    public function properties(){
        return $this->hasMany(Property::class, 'Beneficiary_ID', 'id');

    }
    public function aidDistributions(){
        return $this->hasMany(AidDistribution::class, 'Beneficiary_ID', 'id');

    }
}
