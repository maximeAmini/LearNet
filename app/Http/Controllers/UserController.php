<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //afficher le dashboard
    public function dashboard(){
        $myCours = DB::select("SELECT DISTINCT(c.id),COUNT(episode_id)as nbR,
            (SELECT COUNT(E1.id) From episodes E1 WHERE E1.cours_id = C.id ) as nbE,
            C.* FROM cours C,complitions CM,episodes E WHERE episode_id = E.id and E.cours_id=C.id and `user-id`=? GROUP by C.id"
            , [auth()->id()]);

        $cours = Cours::with('user')->select('cours.*',DB::raw(
            '(SELECT COUNT(DISTINCT("user-id"))
            FROM complitions
            INER JOIN episodes ON episode_id = episodes.id
            WHERE episodes.cours_id=cours.id
            ) AS part'
            ))->withCount('episodes')
        ->where('user_id',auth()->id())->latest()->get();
        return Inertia::render('Dashboard', ['cours'=>$cours, 'myCours'=>$myCours]);
    }
    //afficher le porfile d'un user
    public function show(int $id){
        $user= User::find($id);
        $cours = Cours::with('user')->withCount('episodes')->where('user_id',$user->id)->latest()->get();
        return Inertia::render('User', ['user1'=>$user,'cours'=>$cours]);
    }
}
