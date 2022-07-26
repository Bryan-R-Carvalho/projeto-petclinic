<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'brand',
        'quantity',
        'created_at',
        'updated_at'
    ];
    public function vaccinePet()
    {
        return $this->hasMany(VaccinePet::class);
    }
}