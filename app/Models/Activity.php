<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function projectActivity(){
        $this->hasMany(Project::class);
    }
    public function activityTransaction(){
        $this->hasMany(Transaction::class);
    }
}
