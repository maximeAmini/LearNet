<?php

namespace App\Models;

use App\Models\Episodes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    public function episodes(){
        return $this->hasMany(Episodes::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
