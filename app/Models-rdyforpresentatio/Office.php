<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    public function officeUsers(){
        $this->hasMany(User::class);
    }

    public function officeProjects(){
        $this->hasMany(Project::class);
    }
}
