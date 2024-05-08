<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use App\Models\Position;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'position',
        'department',
        'username',
        'password',
        'address',

    ];

    public function department(){
        return $this->belongsToMany(Department::class, 'employees')->withPivot('department_id');
    }
    public function position(){
        return $this->belongsToMany(Position::class, 'employees')->withPivot('position_id');
    }
}
