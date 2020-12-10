<?php

namespace App\Http\Controllers;
use App\Models\Agents;
use App\Models\Estimates;
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
    public function getEstimatesCurrentDate()
    {
        return getEstimatesToday();
    }
    public function deleteEstimate($eid)
    {
        $estmts=Estimates::find($eid);
        $estmts->delete();
    }
    public function getInvoice($id)
    {
        $inv=getInvoiceById($id);
        return view('invoice',compact('inv'));
    }
}
