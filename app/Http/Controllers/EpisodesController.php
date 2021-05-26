<?php

namespace App\Http\Controllers;

use App\Models\cours;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function show(int $id){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->first();
        return Inertia::render('Episodes/show', ['cour'=>$cour]);
    }
}
