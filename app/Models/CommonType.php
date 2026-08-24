<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];


    public function websiteContents()
    {
        return $this->hasMany(WebsiteContent::class, 'page_name', 'name');
    }
}
