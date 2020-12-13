<template>
<div>
  <div class="card bg-transparent mt-3 shadow-none border border-light">
  <div class="card-content">
  <div class="row row-group m-0">
    <div class="col-12 col-lg-6 col-xl-4 border-light">
    <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-info mb-0">{{l}}</h4>
            <span>Total Agents</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-info">
            <i class="icon-user text-white"></i></div>
        </div>
        </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-4 border-light">
    <div class="card-body">
          <div class="media align-items-center">
           <div class="media-body text-left">
            <h4 class="text-danger mb-0">{{tel}}</h4>
            <span>Total Estimates Today</span>
          </div>
           <div class="align-self-center w-circle-icon rounded bg-danger">
            <i class="icon-wallet text-white"></i></div>
        </div>
        </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-4 border-light">
    <div class="card-body">
          <div class="media align-items-center">
          <div class="media-body text-left">
            <h4 class="text-success mb-0">{{tot}}</h4>
            <span>Total Collected Today</span>
          </div>
          <div class="align-self-center w-circle-icon rounded bg-success">
            <i class="icon-pie-chart text-white"></i></div>
        </div>
        </div>
  </div>
  </div>
</div>
</div>

  </div>
   
  
  
  

 
</template>

<script>
    export default {
      data(){
        return{
          agents:[],
          l:null,
          estimates:[],
          tel:null,
        }

      },
      methods:{

        getAgents(){
          axios.get('/getagents').then(res=>{
            console.log(res.data)
            this.agents=res.data;
            this.l=res.data.length;
          })
        },
        getEstimates(){
          axios.get('/getestimatestoday').then(res=>{
            console.log(res.data)
            this.estimates=res.data;
            this.tel=res.data.length;
            var sum=0;
            this.tot= this.estimates.reduce((sum, estimate) => sum + estimate.estimated_price, 0);  
        });
        },
      },
        mounted() {
            this.getAgents();
            this.getEstimates();
        }
    }
</script>
