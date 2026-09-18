<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, \App\Traits\HasTranslations;

    protected $fillable = ['name', 'name_bn'];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }

    public function getNameAttribute($value)
    {
        return $this->getTranslated('name', $value);
    }
}
