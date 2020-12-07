<?php
use Illuminate\Support\Facades\DB;
use App\Models\Agents;
function getAllAgents()
{
    $users=DB::table('users')->get();
    return $users;
}
function createAgent($data)
{
    
    $aname=strtoupper($data->aname);
    $checker=Agents::where('agent_name',$aname)->first();
    if(is_null($checker))
    {
        Agents::create(['agent_name'=>$aname,'contact_number'=>$data->cno]);
        return true;    
    }
    else
    {
        return false;
    }
}
function getAgents()
{
    $agents=Agents::all();
    return $agents;
}

