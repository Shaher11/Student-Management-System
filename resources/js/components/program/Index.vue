

<template>
  
  <div>

 <div class="row">
  <router-link to="/add-program" class="btn btn-primary">Add Program </router-link>
   
 </div>
<br>
   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search using Course Name">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Programs List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Program Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
        
                      <tr v-for="program in filtersearch" :key="program.id">
                        <td>{{ program.id }}</td>
                        <td>{{ program.name }}</td>
                        <td>{{ program.description }}</td>
                        <td>
                          <router-link :to="{name: 'edit-program', params:{id:program.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                          <button @click="deleteProgram(program.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></button>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


   
  </div>


</template>



<script type="text/javascript">
  
  export default {
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        programs:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.programs.filter(program => {
         return program.name.match(this.searchTerm)
      }) 
      }
    },  
 
  methods:{
    allProgram(){
      axios.get('/api/program/')
      .then(({data}) => (this.programs = data))
      .catch()
    },
  deleteProgram(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/program/'+id)
               .then(() => {
                this.programs = this.programs.filter(program => {
                  return program.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'programs'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  } 

  },
  created(){
    this.allProgram();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>