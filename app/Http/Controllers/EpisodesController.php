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
    //pour afficher tout les épisodes d'un cours
    public function show(int $id, int $idE){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->first();
        $watched= auth()->user()->episodes;
        return Inertia::render('Episodes/show', ['cour'=>$cour, 'watched'=>$watched, 'idE'=>$idE]);
    }
    //pour marquer la fin d'un episode
    public function toggelProg(Request $req){
        $id =  $req->input('epId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
    //afficher le formulair d'ajout d'episodes
    public function add(int $id){
        return Inertia::render('Episodes/add',['id'=>$id]);
    }
    //ajouter les episodes
    public function store(int $id,Request $req){
        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
            'video_url'=> 'required',
        ]);

        $new = Episodes::create($req->all());

        return Redirect::route('cours.show',['id'=>$new->cours_id]);
    }
    //pour afficher le formulaire de modifications d'episode
    public function edit(int $idC, int $idE){
        $episode = Episodes::where('id',$idE)->first();
        $cour = Cours::where('id',$episode->cours_id)->first();
        $this->authorize('update',$cour);

        return Inertia::render('Episodes/Edit', ['id'=>$idC,'episode'=>$episode]);
    }
    //pour modifier un episode
    public function update(int $id, int $idE, Request $req){
        $episode = Episodes::where('id',$idE)->first();
        $cour = Cours::where('id',$episode->cours_id)->first();
        $this->authorize('update',$cour);

        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
            'video_url'=> 'required',
        ]);

        $episode->update($req->all());

        return Redirect::route('cours.show',['id'=>$id]);
    }
}
