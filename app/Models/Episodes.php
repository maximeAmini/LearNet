<?php

namespace App\Models;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;

    protected $fillable = ['title','discription', 'video_url','cours_id'];

    public function cour(){
        return $this->belongsTo(Cours::class);
    }

    
}
