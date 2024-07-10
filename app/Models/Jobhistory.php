<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobhistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'job_id',
        'department_id',
    ];
    public function getdepartmentName()
    {
        return $this->belongsTo(Department::cLass, 'department_id');
    }
    public function getjobName()
    {
        return $this->belongsTo(Job::cLass, 'job_id');
    }
}
