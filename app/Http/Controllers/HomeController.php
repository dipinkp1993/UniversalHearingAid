<?php

namespace App\Http\Controllers;
use App\Models\Agents;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
    public function agents()
    {
        return view('agents');
    }
    public function addAgents(Request $request)
    {
        $res=createAgent($request);
        return $res;         
    }
    public function loadAgents()
    {
        return getAgents();
    }
    public function deleteAgent($aid)
    {
        $agents=Agents::find($aid);
        $agents->delete();
    }
    public function estimates()
    {
        return view('estimates');
    }
    public function addEstimates(Request $request)
    {
        createEstimate($request);        
    }
}
