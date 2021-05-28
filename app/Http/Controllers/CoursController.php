<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CoursController extends Controller
{
    public function index(){
        $cours = Cours::with('user')
        ->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user-id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))
        ->withCount('episodes')->latest()->get();

        return Inertia::render('Cours/index', ['cours'=>$cours]);
    }

    public function show(int $id){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user-id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))
        ->first();
        $watched= auth()->user()->episodes;

        return Inertia::render('Cours/show', ['cour'=>$cour, 'watched'=>$watched]);
    }
    
    public function add(){
        return Inertia::render('Cours/add');
    }

    public function store(Request $req)
    {
        $new = Cours::create($req->all());

        return Redirect::route('cours.show',['id'=>$new->id]);
    }
}
