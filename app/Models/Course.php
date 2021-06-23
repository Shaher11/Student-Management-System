<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'description'

    ];

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('work_out','activity_out','final_out')->withTimestamps();
    } 
    
}