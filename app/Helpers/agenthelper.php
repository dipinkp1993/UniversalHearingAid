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
    $ageid=(int) $data->aid;
    Estimates::create(['cust_name'=>$data->cname,
    'agentid'=>$ageid,'machine_name'=>$data->mname,
    'machine_number'=>$data->mno,'estimated_price'=>$data->eprice,'age_id'=>$data->aid,'complaints'=>$data->comp]);
}
function getEstimatesToday()
{
    $estimates=DB::table('estimates')
    ->select('agents.agent_name','estimates.id','estimates.cust_name','estimates.machine_name','estimates.machine_number','estimates.estimated_price','estimates.complaints')
    ->join('agents','estimates.agentid','=','agents.id')
    ->orderBy('estimates.id','desc')
    ->whereDate('estimates.created_at', date('Y-m-d'))->get();
    return $estimates;
}
function getInvoiceById($eid)
{
    $estimate=DB::table('estimates')
    ->select('agents.agent_name','agents.contact_number','estimates.id','estimates.cust_name','estimates.machine_name','estimates.machine_number','estimates.estimated_price','estimates.complaints')
    ->join('agents','estimates.agentid','=','agents.id')
    ->where('estimates.id',$eid)->first();
    return $estimate;
}
function getDistinctDates($data){
    $report = DB::table('estimates')
    ->select(DB::Raw('DATE(estimates.created_at) as day'))
    ->whereMonth('estimates.created_at', $data->m)
    ->whereYear('estimates.created_at', $data->y)
    ->distinct()
    ->get();
    return $report;
}
function getEntry($date)
{
    
    $report = DB::table('estimates')
    ->select('agents.agent_name','estimates.id as eid','estimates.cust_name','estimates.machine_name','estimates.machine_number','estimates.estimated_price','estimates.complaints','estimates.created_at')
    ->join('agents','estimates.agentid','=','agents.id')
    ->whereDate('estimates.created_at',$date)
    ->get();
    return $report;
}
function getReportByMonth($data)
{
    $report = DB::table('estimates')
    ->select('agents.agent_name','estimates.id','estimates.cust_name','estimates.machine_name','estimates.machine_number','estimates.estimated_price','estimates.complaints',DB::Raw('DATE(estimates.created_at) as day'))
    ->join('agents','estimates.agentid','=','agents.id')
    ->whereMonth('estimates.created_at', $data->m)
    ->whereYear('estimates.created_at', $data->y)
    ->orderBy('day','ASC')
    ->get();
    return $report;
}
function getTotalBydate($data)
{
    
    $report = DB::table('estimates')
    ->select(DB::Raw('DATE(estimates.created_at) as day,SUM(estimated_price) as tprice','esimates.id as estid'))
    ->whereMonth('estimates.created_at', $data->m)
    ->whereYear('estimates.created_at', $data->y)
    ->groupBy('day')
    ->orderBy('day','ASC')
    ->get();
    return $report;
}
function getEstimatesAday($day)
{
    $estimates=DB::table('estimates')
    ->select('agents.agent_name','estimates.id','estimates.cust_name','estimates.machine_name','estimates.machine_number','estimates.estimated_price','estimates.complaints')
    ->join('agents','estimates.agentid','=','agents.id')
    ->orderBy('estimates.id','desc')
    ->whereDate('estimates.created_at',$day)->get();
    return $estimates;

}