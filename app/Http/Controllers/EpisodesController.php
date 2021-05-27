<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function show(int $id){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->first();
        $watched= auth()->user()->episodes;
        return Inertia::render('Episodes/show', ['cour'=>$cour, 'watched'=>$watched]);
    }

    public function toggelProg(Request $req){
        $id =  $req->input('epId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
}
