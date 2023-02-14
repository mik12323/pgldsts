<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Model
{
    use HasFactory;

    public function userProject(){
        return $this->hasMany(Project::class);
    }

    public function userTransaction(){
        return $this->hasMany(Transaction::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }


}
