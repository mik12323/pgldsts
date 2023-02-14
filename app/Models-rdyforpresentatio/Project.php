<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function activity(){
        return $this->belongsTo(Activty::class);
    }
}
