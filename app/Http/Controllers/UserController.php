<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard(){

        $myCours = DB::select("SELECT DISTINCT(c.id),COUNT(episode_id)as nbR,
            (SELECT COUNT(E1.id) From episodes E1 WHERE E1.cours_id = C.id ) as nbE,
            C.* FROM cours C,complitions CM,episodes E WHERE episode_id = E.id and E.cours_id=C.id and `user-id`=? GROUP by C.id"
            , [auth()->id()]);

        $cours = Cours::with('user')->withCount('episodes')->where('user_id',auth()->id())->latest()->get();
        //dd($cours);
        return Inertia::render('Dashboard', ['cours'=>$cours, 'myCours'=>$myCours]);
    }
}
