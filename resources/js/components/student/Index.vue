

<template>
  
  <div>

    <div class="row">
      <router-link to="/add-student" class="btn btn-primary">Add Student </router-link>
      
    </div>
    <br>
      <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search using First Name">


    <br>

    <div class="row">
              <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                  </div>
                  <div class="table-responsive" >
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>Index</th>
                          <th>ID</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Level</th>
                          <th>Program</th>
                          <th>Course</th>
                          <th>Date of birth</th>
                          <!-- <th>Gender</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
          
                        <tr v-for="(student, i) in filtersearch" :key="i">
                          <td>{{ student.id }}</td>
                          <td>{{ student.identifier }}</td>
                          <td>{{ student.first_name +' '+ student.middle_name +' '+ student.last_name }}</td>
                          <td>{{ student.email }}</td>
                          <td>{{ student.level_id }}</td>
                          <td>{{ student.program_id}}</td>
                          <td><span v-for="(course, j) in student.courses" :key="j" class="badge badge-pill badge-info m-1">{{course.name}}</span></td>
                          <td>{{ student.birthdate }}</td>
                          <td>
                            <router-link :to="{name: 'student-profile', params:{id:student.id}}" class="btn btn-sm btn-info">Show</router-link>
                            <router-link :to="{name: 'edit-student', params:{id:student.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <button @click="deleteStudent(student.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></button>
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
        students:[],
        searchTerm:''
      }
    },

    computed:{
      filtersearch(){
      return this.students.filter(student => {
         return student.first_name.match(this.searchTerm)
      }) 
      }
    },  
 
  methods:{
    allStudent(){
      axios.get('/api/student/')
      .then(({data}) => (this.students = data))
      .catch()
    },
  deleteStudent(id){
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
                axios.delete('/api/student/'+id)
               .then(() => {
                this.students = this.students.filter(student => {
                  return student.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'students'})
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
    this.allStudent();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>