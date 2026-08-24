<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'visa_type_id'];


    public function visaType()
    {
        return $this->belongsTo(VisaType::class, 'visa_type_id');
    }
}
