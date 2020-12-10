<template>
<div>

<div class="row">
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
  </div><!--End Row-->
  <div class="row">
  </div>


    <div class="row" v-if="l>0">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Agents</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-bind:key="agent.id"  v-for="agent in agents">
                        <td class="text-center">{{agent.agent_name}}</td>
                        <td class="text-center">{{agent.contact_number}}</td>
                        <td class="text-center" @click.prevent="deleteAgents(agent.id)"><a ><i class="fa fa-trash"></i></a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->
     <div class="row" v-else>
        <div class="col-lg-12">
          <div class="card">
             
				  <div class="alert alert-warning alert-round alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-exclamation"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Warning!</strong> Agents Are Not Added Yet!Agent List is empty </span>
				    </div>
            </div>
          </div>
        </div>
      </div>
      
  </div>

  
  
  

 
</template>

<script>
import Estimates from './Estimates.vue';
    export default {
  components: { Estimates },
      data(){
        return{
          newagent:{aname:'',cno:''},
          hasNameError:false,
          nameError:"",
          hasAdded:false,
          successMsg:false,
          hasAlready:false,
          alreadyError:'',
          agents:[],
          l:null,
        }
      },
      methods:{
        addAgents(){
          var input=this.newagent;
          var rembno = /^\d{10}$/
          if(input['aname']==''){
            this.hasNameError=true;
            this.nameError="Whoops!Please Enter Agent Name";
            input=null;
          }
          else if(input['cno']==''){
            this.hasNameError=true;
            this.nameError="Whoops!Please Enter Phone Number";
            this.hasAdded=false;
            input=null;
          }
          else if(!rembno.test(input['cno'])){
            this.hasNameError=true;
            this.nameError="Whoops!Please Enter Valid Phone Number"
            this.hasAdded=false;

          }
          else{
            axios.post('/agents',input).then(res=>{
              if(res.data==1)
              {
                this.hasAdded=true;
                this.hasAlready=false;
                this.hasNameError=false;
                this.successMsg="Agent has been Added Succesfully";
                this.newagent={};
                this.getAgents();
              }
              else
              {
                this.hasAdded=false;
                this.hasAlready=true;
                this.alreadyError="Agent with This Name Already Exists";
                this.hasNameError=false;
              }
            });
          }
        },
        changeHasNameError(){
          this.hasNameError=false;
          this.hasAlready=false;
          this.hasAdded=false;
          this.newagent={aname:'',cno:''}
        },
        getAgents(){
          axios.get('/getagents').then(res=>{
            console.log(res.data)
            this.agents=res.data;
            this.l=res.data.length;
            
          })
        },
        deleteAgents(agentid){
          if(confirm("Do You Want to Delete?")){
            axios.post('/deleteagents/'+agentid).then(res=>{
              this.agents=this.agents.filter(ag=>ag.id!==agentid);
              this.l=this.agents.length;

            })
          }
        }
      },
      mounted(){
        this.getAgents();

      }
    }
</script>
