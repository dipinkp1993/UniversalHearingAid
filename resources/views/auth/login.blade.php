@extends('auth.loginoutline')

@section('content')
 
    <div class="height-70v d-flex align-items-center justify-content-center">
      
	<div class="card border-info border-top-sm border-bottom-sm bg-light rounded-circle card-authentication1 mx-auto my-5 animated bounceInDown">
   
		<div class="card-body">
      
		 <div class="card-content p-2">
		 	<div class="text-center">
		 	
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
       <form method="POST" action="{{ route('login') }}">
            @csrf
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="email" class="sr-only">Email</label>
				  <input type="text" id="email" class="form-control form-control-rounded  @error('email') is-invalid @enderror" name="email" placeholder="Email">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
         @enderror
               </div>
              
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="password" class="sr-only">Password</label>
				  <input type="password" id="password" class="form-control form-control-rounded @error('password') is-invalid @enderror" name="password" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
          </div>
          @error('password')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
          @enderror
               </div>
               
			  </div>
			<div class="form-row mr-0 ml-0">
			 <button type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
			 </form>
		   </div>
		  </div>
	     </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  @endsection
	