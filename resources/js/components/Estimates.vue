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
            
              <div class="alert alert-danger alert-dismissible" role="alert" v-if="hasCnameError || hasAidError || hasMnameError || hasMnoError || hasEpriceError">
				   <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong></strong> {{nameError}}</span>
				    </div>
                  </div>
             <div class="alert alert-success alert-dismissible" role="alert" v-if="hasAddedSuccess">
				   <button @click.prevent="changeHasNameError()" type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon contrast-alert">
					 <i class="icon-close"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong></strong> {{successMsg}}</span>
				    </div>
                  </div>
            <div class="form-group row">
              <label for="cname" class="col-sm-2 col-form-label">Customer Name</label>
              <div class="col-sm-6">
                <input type="text" v-model="newestimate.cname" class="form-control" id="cname" name="cname">
              </div>
            </div>
           
            <div class="form-group row">
              <label for="aid" class="col-sm-2 col-form-label">Agent Name</label>
              <div class="col-sm-6">
                <select v-model="newestimate.aid" class="form-control" id="aid" name="aid">
                    <option disabled value="no">Select An Agent</option>
                    <option v-bind:key="agent.id" v-for="agent in agents" :value="agent.id">{{agent.agent_name}}</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="mname" class="col-sm-2 col-form-label">Machine Name</label>
              <div class="col-sm-6">
                <input type="text" v-model="newestimate.mname" class="form-control" id="mname" name="mname">
              </div>
            </div>
            <div class="form-group row">
              <label for="mno" class="col-sm-2 col-form-label">Machine Number</label>
              <div class="col-sm-6">
                <input type="text" v-model="newestimate.mno" class="form-control" id="mno" name="mno">
              </div>
            </div>
            <div class="form-group row">
              <label for="eprice" class="col-sm-2 col-form-label">Estimated Price</label>
              <div class="col-sm-6">
                <input type="text" v-model="newestimate.eprice" class="form-control" id="eprice" name="eprice">
              </div>
            </div>
            <div class="form-footer">
            
                <button type="submit" class="btn btn-success" @click.prevent="addEstimates()"><i class="fa fa-check-square-o"></i> SAVE</button>
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
      data(){
        return{
          newestimate:{cname:'',aid:'',mname:'',mno:'',eprice:''},
          agents:[],
          hasCnameError:false,
          hasAidError:false,
          hasMnameError:false,
          hasMnoError:false,
          hasEpriceError:false,
          hasAddedSuccess:false,
          nameError:"",
          successMsg:false,
          hasAdded:false,
          hasAlready:false,
          estimates:[],
          l:null,
        }
      },
      methods:{
        addEstimates(){
          var input=this.newestimate;
          if(input['cname']==''){
            this.errorState(true,false,false,false,false,false);
            this.nameError="Please Enter Customer Name";
            console.log(this.hasCname);
            input=null;
          }
          else if(input['aid']==''){
            this.errorState(false,true,false,false,false,false);
            this.nameError="Please select An Agent";
            this.hasAdded=false;
            input=null;
          }
          else if(input['mname']==''){
            this.errorState(false,false,true,false,false,false);
            this.nameError="Please Enter Machine Name";
            this.hasAdded=false;
            input=null;
          }
          else if(input['mno']==''){
            this.errorState(false,false,false,true,false,false);
            this.nameError="Please Enter Machine Number";
            this.hasAdded=false;
            input=null;
          }
          else if(input['eprice']==''){
            this.errorState(false,false,false,false,true,false);
            this.nameError="Please Enter Estimated Price";
            this.hasAdded=false;
            input=null;
          }
         else{
            axios.post('/estimates',input).then(res=>{
                this.errorState(false,false,false,false,false,true);
                this.successMsg="New Estimate has been Added Succesfully";
                this.newestimate={cname:'',aid:'',mname:'',mno:'',eprice:''};
                //this.getAgents();
            });
          }
        },
        errorState(hasCname,hasAid,hasMname,hasMno,hasEprice,hasAdded){
            this.hasCnameError=hasCname;
            this.hasAidError=hasAid;
            this.hasMnameError=hasCname;
            this.hasMnoError=hasMno;
            this.hasEpriceError=hasEprice;
            this.hasAddedSuccess=hasAdded;
        },
        changeHasNameError(){
          this.errorState(false,false,false,false,false,false);
          this.newestimate={cname:'',aid:'',mname:'',mno:'',eprice:''};
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
              this.l=agents.length;

            })
          }
        }
      },
      mounted(){
        this.getAgents();

      }
    }
</script>
