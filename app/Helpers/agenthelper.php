<?php
use Illuminate\Support\Facades\DB;
use App\Models\Agents;
use App\Models\Estimates;
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
function createEstimate($data)
{
  
    Estimates::create(['cust_name'=>$data->cname,
    'agentid'=>1,'machine_name'=>$data->mname,
    'machine_number'=>$data->mno,'estimated_price'=>$data->eprice,'age_id'=>$data->aid]);

}

