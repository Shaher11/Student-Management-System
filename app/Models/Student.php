<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

       protected $fillable = [
        'level_id',
        'program_id',
        'identifier',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'birthdate',
        'gender'
    ];
    
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->middle_name.' '.$this->last_name;
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
 
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps()->withPivot('work_out','activity_out','final_out');
    }

    
}