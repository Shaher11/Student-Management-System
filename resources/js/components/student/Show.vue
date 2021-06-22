<template>
  
  <div>

    <div class="row">
      <div class="col-lg-12 mb-4">

        <div class="card">
          <div class="card-header py-3 align-items-center ">
            <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">Student name:</h4> 
              <h4 class="font-weight-bold text-black">{{ student.first_name }}</h4>
            </div>
             <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">Level:</h4> 
              <h4 class="font-weight-bold text-black">{{ student.level_id }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>  
    <br>
    <div class="align-items-center flex flex-row justify-content-between">
      <input type="text" v-model="searchTerm" class="form-control  my-3" style="width: 300px;" placeholder="Search using Course Name">
      <div class="row">
        <router-link to="/add-student-course" class="btn btn-primary ">Add Course</router-link>
        
      </div>
    </div>

    <br>

    <div class="row">
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Courses List</h6>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th>Index</th>
                          <th>Course Name</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
          
                      <!-- <tr v-for="course in student.courses" > -->

                          <td>{{ course.id }}</td>
                          <td>{{ course.name }}</td>
                          <td>{{ course.description }}</td>
                          <td>
                            <!-- <router-link :to="{name: 'student-profile', params:{id:student.id}}" class="btn btn-sm btn-info">Show</router-link>
                            <router-link :to="{name: 'edit-student', params:{id:student.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <button @click="deleteStudent(student.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></button> -->
                          </td>
                      <!-- </tr> -->
                      
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
        courses:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.courses.filter(course => {
         return course.name.match(this.searchTerm)
      }) 
      }
    }, 
    
    // created(){
    //   let id = this.$route.params.id
    //   axios.get('/api/student/'+id)
    //   .then(({data}) => (this.form = data))
    //   .catch(console.log('error'))
    // },
 
  methods:{
     allCourse(){
      axios.get('/api/course/')
      .then(({data}) => (this.courses = data))
      .catch()
    },
 
    student(){
     let id = this.$route.params.id
      axios.get('/api/student/'+id)
      .then(({data}) => (this.form = data))
      .catch(console.log('error'))
    },

  },
  created(){
    this.student();
    this.allCourse();
  } 
  

  } 
</script>

