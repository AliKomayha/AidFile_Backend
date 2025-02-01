<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aid extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function aidDistributions()
    {
        return $this->hasMany(AidDistribution::class, 'Aid_ID', 'id');
    }
}
