<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'departments_positions')->withPivot('position_id');
    }

}
