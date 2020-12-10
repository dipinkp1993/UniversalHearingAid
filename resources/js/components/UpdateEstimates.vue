
  <template>
  
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form id="personal-info">
            <h4 class="form-header text-uppercase">
              <i class="fa fa-user-circle-o"></i>
               Agent Info
            </h4>
              <div class="alert alert-danger alert-dismissible" role="alert" v-if="hasNameError">
				   <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong></strong> {{nameError}}</span>
				    </div>
                  </div>
           <div class="alert alert-success alert-dismissible" role="alert" v-if="hasAdded">
				   <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong></strong> {{successMsg}}</span>
				    </div>
                  </div>
             <div class="alert alert-danger alert-dismissible" role="alert" v-if="hasAlready">
				   <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong></strong> {{alreadyError}}</span>
				    </div>
                  </div>
            <div class="form-group row">
              <label for="input-1" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-6">
                <input type="text" v-model="newagent.aname" class="form-control" id="aname" name="aname" required>
              </div>
            </div>
           
            <div class="form-group row">
              <label for="input-4" class="col-sm-2 col-form-label">Contact Number</label>
              <div class="col-sm-6">
                <input type="text" v-model="newagent.cno" class="form-control" id="cno" name="cno" required>
              </div>
            </div>
            <div class="form-footer">
            
                <button type="submit" class="btn btn-success" @click.prevent="addAgents()"><i class="fa fa-check-square-o"></i> SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
 <!--End Row-->
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
