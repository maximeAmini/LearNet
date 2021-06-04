<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //afficher le dashboard
    public function dashboard(){
        $user= auth()->user();
        $abonné = auth()->user()->abonnés;

        $myCours = DB::select("SELECT DISTINCT(c.id),COUNT(episode_id)as nbR,
            (SELECT COUNT(E1.id) From episodes E1 WHERE E1.cours_id = C.id ) as nbE,
            C.* FROM cours C,complitions CM,episodes E WHERE episode_id = E.id and E.cours_id=C.id and CM.user_id=? GROUP by C.id"
            , [auth()->id()]);

        $cours = Cours::with('user')->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user_id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))->withCount('episodes')
        ->where('user_id',auth()->id())->latest()->get();
        return Inertia::render('Dashboard', ['cours'=>$cours, 'myCours'=>$myCours, 'user1'=>$user, 'abonné'=>$abonné]);
    }
    //afficher le porfile d'un user
    public function show(int $id){
        $idu = auth()->id();
        $user= User::find($id);
        if($id==$idu){
            return Redirect::route('dashboard');
        }else{
            $cours = Cours::with('user')->withCount('episodes')->where('user_id',$user->id)->latest()->get();
            $abonné = auth()->user()->abonnés;
            return Inertia::render('User', ['user1'=>$user,'cours'=>$cours,'abonné'=>$abonné]);
        }
    }
    //pour marquer l'bon,ement
    public function sabonné(Request $req){
        $id =  $req->input('idU');
        $user = auth()->user();

        $user->abonnés()->toggle($id);

        return $user->user;
    }
    //pour la recherche
    public function search(string $data){
        $cours= User::when($data, function($query, $term){
            $query->where('name','LIKE', '%'.$term.'%'); 
        })->latest()->get();

        return Inertia::render('Cours/Search',['cours'=>$cours, 'search'=>$data, 'user1'=> true]);
    }
}
