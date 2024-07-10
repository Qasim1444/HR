<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number_of_day_work',
        'bonus',
        'overtime',
        'gross_salary',
        'cash_advance',
        'late_hours',
        'absent_days',
        'sss_contribution',
        'philhealth',
        'total_deductions',
        'netpay',
        'payroll_monthly',
    ];

    public function getUserName()
    {
        return $this->belongsTo(user::cLass, 'user_id');
    }

}
