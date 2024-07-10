<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'manager_id',
        'location_id',
    ];
    public function getmanagerName()
    {
        return $this->belongsTo(Manager::cLass, 'manager_id');
    }
    public function getlocationName()
    {
        return $this->belongsTo(Location::cLass, 'location_id');
    }
}
