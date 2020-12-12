
  <template>
  <div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form id="personal-info">
            <h4 class="form-header text-uppercase">
              <i class="fa fa-user-circle-o"></i>
               Monthly Estimate Report
            </h4>
          <div class="form-group row">
              <label for="y" class="col-sm-2 col-form-label">Year</label>
              <div class="col-sm-6">
                <select class="form-control" v-model="newreport.y"  id="y" name="y" required>
                    <option disabled value="no">Select An Year</option>
                    <option v-bind:key="year.value" v-for="year in years" :value="year.value">{{year.value}}</option>
                </select>
              </div>
            </div>
         <div class="form-group row">
              <label for="m" class="col-sm-2 col-form-label">Month</label>
              <div class="col-sm-6">
                <select class="form-control" v-model="newreport.m" id="m" name="m" required>
                    <option disabled value="no">Select A Month</option>
                    <option v-bind:key="month.id" v-for="month in months" :value="month.id">{{month.value}}</option>
                </select>
              </div>
            </div>
            <div class="form-footer">
            
                <button type="submit" class="btn btn-success" @click.prevent="generateMonthlyReport()"><i class="fa fa-check-square-o"></i>See Report</button>
            </div>
          </form>
        </div>
      </div>
    </div>
     <div v-if="dl>0">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> List of Estimates On {{da}}</div>
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
                        <td class="text-center" @click.prevent="deleteEstimates(estimate.id)"><a ><i class="fa fa-trash"></i></a></td>       
                    </tr>
                </tbody>   
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->
    </div>
    <div v-if="l>0">
       <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">Total Estimated Per Day</div>
            <div class="card-body">
			  <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Date of Estimate</th>
                        <th class="text-center">Total Collected</th>
        
                    </tr>
                </thead>
                <tbody>
                    <tr v-bind:key="chartDailyAmount.estid"  v-for="chartDailyAmount in chartDailyAmounts">
                        <td class="text-center"><a href="#" @click=" getEstimatesDay(chartDailyAmount.day)">{{chartDailyAmount.day}}</a></td>
                        <td class="text-center">{{chartDailyAmount.tprice}}</td>    
                    </tr>
                    <tr><th class="text-center">Total</th><th class="text-center"><i class="fas fa-rupee-sign"></i>RS {{total}}</th></tr>
                </tbody>   
            </table>
            
            </div>
            </div>
          </div>
        </div>
      </div>
    <!-- <div class="row" >
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Monthly Estimates Report</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date of Estimate</th>
                          <th class="text-center">Customer Name</th>
                         <th class="text-center">Agent Name</th>
                        <th class="text-center">Machine Name</th>
                        <th class="text-center">Machine Number</th>
                        <th class="text-center">Complaint</th>
                        <th class="text-center">Estimated Price</th>
                        <th class="text-center">Download</th>
                      
                        <th class="text-center">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-bind:key="estimate.id"  v-for="estimate in monthestimates">
                        <td class="text-center">{{estimate.day}}</td>
                        <td class="text-center">{{estimate.cust_name}}</td>
                        <td class="text-center">{{estimate.agent_name}}</td>
                        <td class="text-center">{{estimate.machine_name}}</td>
                        <td class="text-center">{{estimate.machine_number}}</td>
                        <td class="text-center">{{estimate.complaints}}</td>
                        <td class="text-center">{{estimate.estimated_price}}</td>
                        <td class="text-center"><a @click="openInvoice(estimate.id)"><i class="fa fa-file-o"></i></a></td>
                        <td class="text-center" @click.prevent="deleteEstimates(estimate.id)"><a ><i class="fa fa-trash"></i></a></td>       
                    </tr>
                </tbody>   
            </table>
            
            </div>
            </div>
          </div>
        </div>
      </div>-->
     
    </div>
   
  
  </div>
 
</template>

<script>
import { Bar, Line } from 'vue-chartjs';
    export default {
        data(){
            return {
                years:[{value:'2020'},{ value:'2021'},{ value:'2022'},{ value:'2023'}],
                months:[{id:'1', value:'January'},{id:'2', value:'February'},{id:'3', value:'March'},
                {id:'4', value:'April'},{id:'5', value:'May'},{id:'4', value:'April'},{id:'5', value:'May'},
                {id:'6', value:'June'},{id:'7', value:'July'},{id:'8', value:'August'},{id:'9', value:'September'},
                {id:'10', value:'October'},{id:'11', value:'November'},{id:'12', value:'December'}],
                newreport:{y:'',m:''},
                monthestimates:[],
                chartDailyAmounts:[],
                estimates:[],
                l:null,
                dl:null,
                da:null,
            }
        },
        methods:{
            generateMonthlyReport()
            {
                this.estimates=[];
                
                var i=this.newreport;
                axios.post('/getmonthlychart',i).then((response) => {
            //let data = response.data;
                this.chartDailyAmounts=response.data;
                });
                console.log(this.chartDailyAmounts);
                //this.getMonthlyChart(i);
                axios.post('/monthlyreport',i).then(res=>{
                this.monthestimates=res.data;
                this.l=res.data.length;
                this.dl=null;  
            }); 
                  
            },
             openInvoice(eid){
               window.open('/invoice/'+eid);
            },
          
        getMonthlyChart(inp)
        {
          
            let Days = new Array();
            let Prices = new Array();
            axios.post('/getmonthlychart',inp).then((response) => {
            //let data = response.data;
            this.chartDailyAmounts=res.data;
            this.dl=null;
           /* if(data) {
               data.forEach(element => {
               Days.push(element.year);
               Labels.push(element.tprice);
               Prices.push(element.tprice);
               });
               this.renderChart({
               labels: Days,
               datasets: [{
                  label: 'Total collected',
                  backgroundColor: '#FC2525',
                  data: Prices
            }]
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }*/
      });            
            },
        getEstimatesDay(date)
        {
          axios.post('/estimatesofaday/'+date).then(res=>{
          this.estimates=res.data;
          this.dl=res.data.length;
          this.da=date;
        }
        );

        },

        },
         computed:{
     total: function() {
      var sum=0;
      this.tot= this.monthestimates.reduce((sum, estimate) => sum + estimate.estimated_price, 0);  
      return this.tot;
    },},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
