<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function dashboard(){
        $watched = ['hey'=> 'hello'];
        $cours=  Cours::with('user')
        ->withCount('episodes')->latest()->get();

        return Inertia::render('Dashboard', ['cours'=>$cours, 'watched'=>$watched]);
    }
}
