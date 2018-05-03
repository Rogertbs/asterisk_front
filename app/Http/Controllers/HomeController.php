<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ligacoes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros=Ligacoes::select(array('calldate','src','dst','billsec','disposition','uniqueid'))->orderBy('calldate','desc')->paginate(8);
        return view('home')->with("ligacoes",$registros);
    }
}
