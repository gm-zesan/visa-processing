<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['visa_type_id','country', 'name', 'email', 'phone', 'message'];
    public function visa_type(){
        return $this->belongsTo(VisaType::class);
    }
}
