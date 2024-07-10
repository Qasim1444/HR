<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    use HasFactory;
    protected $fillable = ['country_name', 'regions_id'];
    public function getregionsName()
{
    return $this->belongsTo(Region::cLass, 'regions_id');
}
}

