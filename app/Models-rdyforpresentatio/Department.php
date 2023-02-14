<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function departmentProjects(){
        return $this->hasMany(Project::class);
    }

    public function departmentUser(){
        return $this->hasMany(User::class);
    }
}
