<template>
  
  <div>

    <div class="row">
      <div class="col-lg-12 mb-4">

        <div class="card">
          <div class="card-header py-3 align-items-center ">
            <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">Student name:</h4> 
              <h4 class="font-weight-bold text-black">{{ student.first_name +' '+ student.middle_name +' '+ student.last_name}}</h4>
            </div>
             <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">ID:</h4> 
              <h4 class="font-weight-bold text-black">{{ student.identifier }}</h4>
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
       
        <!-- <a to="" data-toggle="modal" data-target="#addCourses" class="btn btn-primary "></a> -->
          <button @click="showModel = true" class="py-1 px-3 mr-3 rounded-md bg-blue-600 hover:bg-gray-400 cursor-pointer text-white">
                Add Course
          </button>

        
      </div>
    </div>

    <br>

    <!-- Table-->
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
                          <th>Work out</th>
                          <th>Activity out</th>
                          <th>Final out</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
          
                      <tr v-for="course in student.courses" :key="course.id">

                          <td>{{ course.id }}</td>
                          <td>{{ course.name }}</td>
                          <td>{{ course.description}}</td>
                          <td>{{ course.work_out}}</td>
                          <td>{{ course.activity_out}}</td>
                          <td>{{ course.final_out}}</td>
                          <!--  count work_out, activity_out, final_out-->
                          <td>{{ course.final_out}}</td>    
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

  import AddCourseModel from "./AddCourseModel";
  import { directive as onClickaway } from "vue-clickaway"
  import Model from "../Model.vue";

  export default {
     props: {
        show: Boolean
    },
     components: {
        addCourseModel: AddCourseModel,
        addCourseModel: AddCourseModel,
        appModel: Model,
    },
    created(){
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    
    data(){
      return{
        // student:{},
        student:{
          // student_id: null,
          // course_ids : [],
        },

        showBoards: false,
        showModel: false,
        searchTerm:'',
      }
    }, 
    // created(){
    //   let id = this.$route.params.id
    //   axios.get('/api/student/'+id)
    //   .then(({data}) => (this.student = data))
    //   .catch(console.log('error'))
    // },
  
  directives: {onClickaway},

  methods:{
    // allCourses(){
    //   axios.get('/api/course/')
    //   .then(({data}) => (this.courses = data))
    //   .catch()
    // },
    getStudent(){
     let id = this.$route.params.id
      axios.get('/api/student/'+id)
      .then(({data}) => (this.student = data))
      .catch(console.log('error'))
    },

    insertCourse(){
       axios.post('/api/student/addCourse',this.form)
       .then(() => {
        this.$router.push({ name: 'student'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },

  },

  created(){
    this.getStudent();
    // this.allCourses();
  },

  close(){
    this.$emit("closed")
  }
  

  } 
</script>

