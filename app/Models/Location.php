<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['street_address', 'postal_code', 'city', 'state_province', 'countries_id'];
    public function getcountryName()
    {
        return $this->belongsTo(Countrie::cLass, 'countries_id');
    }
}
