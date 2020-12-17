<?php

namespace App\Http\Controllers;
use App\Models\Agents;
use App\Models\Estimates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;


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
    public function monthlyReport()
    {
        return view('monthlyreport');
    }
    public function getmonthlyReport(Request $request)
    {
        return getReportByMonth($request);
    }
    public function getMonthlyChart(Request $request)
    {
        $s= getTotalBydate($request);
        return $s;
    }
    public function getaDayEstimate($id)
    {
        return getEstimatesAday($id);
    }
    public function changePassword()
    {
        return view('changepassword');
    }
    public function postPassword(Request $request)
    {
         /*$udetails = DB::table('users')
        ->where('id',Auth::user()->id)
        ->first(); 
        echo $currentpswd=$udetails->password;
        echo $npswd=Hash::make($request->np);*/
        if (!(Hash::check($request->get('cp'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return redirect()->route('cpassview')
            ->with('danger','Your current password does not matches with the password you provided. Please try again.');  
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('cp'), $request->get('np')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('cpassview')
            ->with('danger','New Password cannot be same as your current password. Please choose a different password..');
        }
        if($request->get('np')!=$request->get('rnp')){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->route('cpassview')
            ->with('danger','Retype Password Mismatch,Try Again');
        }
      
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('np'));
        $user->save();
        return redirect()->route('cpassview')
        ->with('success','Password Changed Successfully');
    }

}
