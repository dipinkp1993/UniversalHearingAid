<template>
<div>
  <div class="card bg-transparent mt-3 shadow-none border border-light">
  <div class="card-content">
  <div class="row row-group m-0">
    <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-info mb-0">4500</h4>
            <span>Total Orders</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-info">
            <i class="icon-basket-loaded text-white"></i></div>
        </div>
        </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
          <div class="media align-items-center">
           <div class="media-body text-left">
            <h4 class="text-danger mb-0">7850</h4>
            <span>Total Expenses</span>
          </div>
           <div class="align-self-center w-circle-icon rounded bg-danger">
            <i class="icon-wallet text-white"></i></div>
        </div>
        </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-success mb-0">87.5%</h4>
            <span>Total Revenue</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-success">
            <i class="icon-pie-chart text-white"></i></div>
        </div>
        </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-3 border-light">
    <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-warning mb-0">8400</h4>
            <span>New Users</span>
          </div><div class="align-self-center w-circle-icon rounded bg-warning">
            <i class="icon-user text-white"></i></div>
        </div>
        </div>
  </div>
  </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form id="personal-info">
            <h4 class="form-header text-uppercase">
              <i class="fa fa-user-circle-o"></i>
               Personal Info
            </h4>
            <div class="form-group row">
              <label for="input-1" class="col-sm-2 col-form-label">First Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-1" name="fname" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-2" class="col-sm-2 col-form-label">Last Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-2" name="lname" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-3" class="col-sm-2 col-form-label">E-mail</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="input-3" name="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-4" class="col-sm-2 col-form-label">Contact Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-4" name="phone" required>
              </div>
            </div>
            <h4 class="form-header">
            <i class="fa fa-file-text-o"></i>
              REQUIREMENTS
            </h4>
            <div class="form-group row">
              <label for="input-5" class="col-sm-2 col-form-label">Company</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-5" name="company" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-6" class="col-sm-2 col-form-label">Interested In</label>
              <div class="col-sm-10">
                <select class="form-control" id="input-6" name="intersted" required>
                    <option>Web Development</option>
                    <option>Mobile Development</option>
                    <option>Digital Marketing</option>
                    <option>Graphic Designing</option>
                    <option>Ecommerce Industr</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-7" class="col-sm-2 col-form-label">Budget</label>
              <div class="col-sm-10">
                <select class="form-control" id="input-7" name="budget" required>
                    <option>BUDGET</option>
                    <option>Less then 2000$</option>
                    <option>2000$ - 10000$</option>
                    <option>10000$ - 20000$</option>
                    <option>Above 20000$</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-8" class="col-sm-2 col-form-label">Select File</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="input-8" name="file" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="input-9" class="col-sm-2 col-form-label">About Project</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="4" id="input-9" name="aboutuser" required></textarea>
              </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!--End Row-->
  </div>
   
  
  
  

 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
