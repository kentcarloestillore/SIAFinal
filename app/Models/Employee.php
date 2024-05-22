<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;
use App\Models\Attendace;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function attendaces(){
        return $this->hasMany(Attendance::class);
    }

    public function salaries(){
        return $this->hasMany(Sakary::class);
    }
}
