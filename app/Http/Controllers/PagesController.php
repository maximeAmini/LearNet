<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function dashboard(){
        $cours = Cours::with('user')->withCount('episodes')->where('user_id',auth()->id())->latest()->get();
        //dd($cours);
        return Inertia::render('Dashboard', ['cours'=>$cours]);
    }
}
