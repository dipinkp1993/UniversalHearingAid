<template>
     <div class="row">
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
