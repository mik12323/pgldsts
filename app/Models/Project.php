<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'office_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function projectTransaction(){
        return $this->hasMany(Transaction::class);
    }
}
