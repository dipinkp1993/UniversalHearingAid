@extends('layouts.outline')

@section('content')
<div>

    <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
                     <div class="alert-icon contrast-alert">
                      <i class="icon-close"></i>
                     </div>
                     <div class="alert-message">
                       <span><strong></strong> {{$message}}</span>
                     </div>
                   </div>
                @endif
                @if ($message = Session::get('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
                     <div class="alert-icon contrast-alert">
                      <i class="icon-close"></i>
                     </div>
                     <div class="alert-message">
                       <span><strong></strong> {{$message}}</span>
                     </div>
                   </div>
                @endif
                
                <form method="post" action="{{ route('cpasssubmit') }}">
                    <h4 class="form-header text-uppercase">
                        <i class="fa fa-user-circle-o"></i>
                         Change Password
                     </h4>
                @csrf
          
                 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Current Password</label>
                        <input type="text" name="cp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current Password" value="{{ old('vbrand') }}" required autocomplete="vbrand" autofocus>
                       
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter New Password</label>
                        <input type="text" name="np" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password" value="{{ old('vname') }}" required autocomplete="vname" autofocus>
                       
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Retype New Password</label>
                        <input type="text" name="rnp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Retype New Password" value="{{ old('vmodel') }}" required autocomplete="vname" autofocus>
                     
                        
                    </div>
                   
                    
                    
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>

            </div>
           
        </div>
      </div><!--End Row-->      
      </div>
</div>
@endsection