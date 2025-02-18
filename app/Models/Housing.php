<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    use HasFactory;

    protected $table = 'housing';
    
    protected $fillable = ['Beneficiary_ID', 'city', 'street', 'building', 'nature_of_housing'];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'Beneficiary_ID', 'id');
    }
}
