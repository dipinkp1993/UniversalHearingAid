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
            
              <div class="alert alert-danger alert-dismissible" role="alert" v-if="hasCnameError || hasAidError || hasMnameError || hasMnoError || hasEpriceError|| hasComplaintError">
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
                <input  type="text" v-model="newestimate.eprice" class="form-control" id="eprice" name="eprice">
              </div>
            </div>
            <div class="form-group row">
              <label for="comp" class="col-sm-2 col-form-label">Complaint</label>
              <div class="col-sm-6">
                <input  type="text" v-model="newestimate.comp" class="form-control" id="comp" name="comp">
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
  <div class="row">
<update-estimates-component></update-estimates-component>
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
                        <th class="text-center">Agent Name</th>
                        <th class="text-center">Machine Name</th>
                        <th class="text-center">Machine Number</th>
                        <th class="text-center">Complaint</th>
                        <th class="text-center">Estimated Price</th>
                        <th class="text-center">Download</th>
                        <th class="text-center">Update</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-bind:key="estimate.id"  v-for="estimate in estimates">
                        <td class="text-center">{{estimate.cust_name}}</td>
                        <td class="text-center">{{estimate.agent_name}}</td>
                        <td class="text-center">{{estimate.machine_name}}</td>
                        <td class="text-center">{{estimate.machine_number}}</td>
                        <td class="text-center">{{estimate.complaints}}</td>
                        <td class="text-center">{{estimate.estimated_price}}</td>
                        <td class="text-center"><a @click="openInvoice(estimate.id)"><i class="fa fa-file-o"></i></a></td>
                        <td class="text-center" @click="updateEstimateForm(estimate.id)"><a href="">Update</a></td>
                        <td class="text-center" @click.prevent="deleteEstimates(estimate.id)"><a ><i class="fa fa-trash"></i></a></td>       
                    </tr>
                    <tr><th class="text-center" colspan="4">Total collected Today</th><th class="text-center">{{total}}</th></tr>
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
				      <span><strong>Warning!</strong> No Entry Today </span>
				    </div>
            </div>
          </div>
        </div>
      </div>
     
  </div>
</template>
<script>
   import {UpdateEstimates} from './UpdateEstimates.vue'
    export default {
      components:{
        UpdateEstimates
      },
      data(){
        return{
          newestimate:{cname:'',aid:'',mname:'',mno:'',eprice:'',comp:''},
          oneEstimate:{cname:'',aid:'',mname:'',mno:'',eprice:'',comp:''},
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
          hasComplaintError:false,
          estimates:[],
          l:null,
          tot:0,
        }
      },
      methods:{
        addEstimates(){
          var input=this.newestimate;
          if(input['cname']==''){
            this.errorState(true,false,false,false,false,false,false);
            this.nameError="Please Enter Customer Name";
            console.log(this.hasCname);
            input=null;
          }
          else if(input['aid']==''){
            this.errorState(false,true,false,false,false,false,false);
            this.nameError="Please select An Agent";
            this.hasAdded=false;
            input=null;
          }
          else if(input['mname']==''){
            this.errorState(false,false,true,false,false,false,false);
            this.nameError="Please Enter Machine Name";
            this.hasAdded=false;
            input=null;
          }
          else if(input['mno']==''){
            this.errorState(false,false,false,true,false,false,false);
            this.nameError="Please Enter Machine Number";
            this.hasAdded=false;
            input=null;
          }
          else if(input['eprice']==''){
            this.errorState(false,false,false,false,true,false,false);
            this.nameError="Please Enter Estimated Price";
            this.hasAdded=false;
            input=null;
          }
          else if(input['comp']==''){
            this.errorState(false,false,false,false,false,false,true);
            this.nameError="Please Enter Complaint";
            this.hasAdded=false;
            input=null;
          }
         else{
            axios.post('/estimates',input).then(res=>{
                this.errorState(false,false,false,false,false,true,false);
                this.successMsg="New Estimate has been Added Succesfully";
                this.newestimate={cname:'',aid:'',mname:'',mno:'',eprice:''};
                this.getEstimates();
            });
          }
        },
        errorState(hasCname,hasAid,hasMname,hasMno,hasEprice,hasAdded,hasComplaint){
            this.hasCnameError=hasCname;
            this.hasAidError=hasAid;
            this.hasMnameError=hasMname;
            this.hasMnoError=hasMno;
            this.hasEpriceError=hasEprice;
            this.hasAddedSuccess=hasAdded;
            this.hasComplaintError=hasComplaint;
        },
        changeHasNameError(){
          this.errorState(false,false,false,false,false,false);
          this.newestimate={cname:'',aid:'',mname:'',mno:'',eprice:''};
        },
        getAgents(){
          axios.get('/getagents').then(res=>{
            //console.log(res.data)
            this.agents=res.data;
            //this.l=res.data.length; 
          });
        },
        getEstimates(){
          axios.get('/getestimatestoday').then(res=>{
            console.log(res.data)
            this.estimates=res.data;
            this.l=res.data.length;
        });
        },
        deleteEstimates(eid){
          if(confirm("Do You Want to Delete?")){
            axios.post('/deleteestimates/'+eid).then(res=>{
            this.estimates=this.estimates.filter(es=>es.id!==eid);
            this.l=this.estimates.length;

            })
          }
        },
        openInvoice(eid){
          window.open('/invoice/'+eid);
        },
        updateEstimateForm(eid){
          this.oneEstimate=this.estimates.filter(est =>est.id==eid)
        }
      },
     computed:{
     total: function() {
      var sum=0;
      this.tot= this.estimates.reduce((sum, estimate) => sum + estimate.estimated_price, 0);  
      return this.tot;
    },
     upperCase: function(string) {
       return string.toUpperCase();
           
    }

      },
      mounted(){
        this.getAgents();
        this.getEstimates();

      }
    }
</script>
