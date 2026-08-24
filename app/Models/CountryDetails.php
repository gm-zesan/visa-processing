<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'image',
        'description',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function visa_types(){
        return $this->hasMany(VisaType::class);
    }
}
