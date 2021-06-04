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
        $abonné = auth()->user()->abonnés;
        return Inertia::render('Episodes/Show', ['cour'=>$cour, 'watched'=>$watched, 'idE'=>$idE,'abonné'=>$abonné]);
    }
    //pour marquer la fin d'un episode
    public function toggelProg(Request $req){
        $id =  $req->input('epId');
        $user = auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;
    }
    //afficher le formulair d'ajout d'episodes
    public function create(int $idC){
        $cour = Cours::where('id',$idC)->first();
        $this->authorize('update',$cour);
        return Inertia::render('Episodes/Create',['idC'=>$idC]);
    }
    //ajouter les episodes
    public function store(int $id,Request $req){
        $cour = Cours::where('id',$id)->first();
        $this->authorize('update',$cour);
        
        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
            'video_url'=> 'required',
        ]);

        $new = Episodes::create($req->all());

        return Redirect::route('cours.show',['cour'=>$new->cours_id]);
    }
    //pour afficher le formulaire de modifications d'episode
    public function edit(int $idC, int $idE){
        $episode = Episodes::where('id',$idE)->first();
        $cour = Cours::where('id',$episode->cours_id)->first();
        $this->authorize('update',$cour);

        return Inertia::render('Episodes/Edit', ['idC'=>$idC,'episode'=>$episode]);
    }
    //pour modifier un episode
    public function update(int $idC, int $idE, Request $req){
        $episode = Episodes::where('id',$idE)->first();
        $cour = Cours::where('id',$episode->cours_id)->first();
        $this->authorize('update',$cour);

        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
            'video_url'=> 'required',
        ]);

        $episode->update($req->all());

        return Redirect::route('cours.show',['cour'=>$idC]);
    }
    //pour supprimé un episode
    public function destroy(int $idC, int $idE){
        $cour= Cours::where('id',$idC);
        //$this->authorize('update',$cour);
        $episode= Episodes::where('id',$idE);
        $episode->delete();
        return Redirect::route('cours.show',['cour'=>$idC]);
    }
}
