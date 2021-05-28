<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Episodes;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EpisodesController extends Controller
{

    public function show(int $id, int $idE){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->first();
        $watched= auth()->user()->episodes;
        return Inertia::render('Episodes/show', ['cour'=>$cour, 'watched'=>$watched, 'idE'=>$idE]);
    }

    public function toggelProg(Request $req){
        $id =  $req->input('epId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }

    public function add(int $id){
        return Inertia::render('Episodes/add',['id'=>$id]);
    }

    public function store(int $id,Request $req){
        $new = Episodes::create($req->all());

        return Redirect::route('cours.show',['id'=>$new->cours_id]);
    }
}
