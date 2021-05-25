<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index(){
        $cours = Cours::with('user')->withCount('episodes')->get();

        return Inertia::render('Cours/index', ['cours'=>$cours]);
    }

    public function show(int $id){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->first();
        return Inertia::render('Cours/show', ['cour'=>$cour]);
    }
}
