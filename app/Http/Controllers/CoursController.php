<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CoursController extends Controller
{
    //pour afficher tout les cours
    public function index(){
        $cours = Cours::with('user')
        ->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user_id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))
        ->withCount('episodes')->latest()->paginate(6);

        return Inertia::render('Cours/index', ['cours'=>$cours]);
    }
    //pour afficher un cours celons son id
    public function show(int $id){
        $cour = Cours::where('id',$id)->with('user')->with('episodes')->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user_id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))
        ->first();
        $watched= auth()->user()->episodes;

        return Inertia::render('Cours/show', ['cour'=>$cour, 'watched'=>$watched]);
    }
    //pour afficher le formulaire d'ajout de cours
    public function create(){
        return Inertia::render('Cours/Create');
    }
    //pour ajouter les cours
    public function store(Request $req){
        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
        ]);

        $new = Cours::create($req->all());

        return Redirect::route('cours.show',['cour'=>$new->id]);
    }
    //pour afficher le formulaire de modifications de cours
    public function edit(int $id){
        $cour = Cours::where('id',$id)->first();
        $this->authorize('update',$cour);
        return Inertia::render('Cours/Edit', ['cour'=>$cour]);
    }
    //pour modifier un cours
    public function update(int $id, Request $req){
        $cour = Cours::where('id',$id)->first();
        $this->authorize('update',$cour);

        $req->validate([
            'title'=> 'required',
            'discription'=> 'required',
        ]);

        $cour->update($req->all());

        return Redirect::route('cours.show',['cour'=>$id]);
    }
    //pour supp un cours
    public function destroy(int $id){
        $cour= Cours::where('id',$id);
        //$this->authorize('update',$cour);
        $cour->delete();
        return  Redirect::route('cours.index');
    }
    //pour la recherche
    public function search(string $data){
        $cours=Cours::when($data, function($query, $term){
            $query->where('title','LIKE', '%'.$term.'%'); 
        })->with('user')
        ->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user_id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))
        ->withCount('episodes')->latest()->get();
        
        return Inertia::render('Cours/Search',['cours'=>$cours, 'search'=>$data, 'user1'=> false]);
    }
}
