<template>
  
  <div>

    <div class="row">
      <div class="col-lg-12 mb-4">

        <div class="card">
          <div class="card-header py-3 align-items-center ">
            <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">Student name:</h4> 
              <h4 class="font-weight-bold text-black">{{ form.first_name +' '+ form.middle_name +' '+ form.last_name}}</h4>
            </div>
             <div class="flex flex-row">
              <h4 class="font-weight-bold text-primary mr-2">Level:</h4> 
              <h4 class="font-weight-bold text-black">{{ form.level_id }}</h4>
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
          
                      <tr v-for="course in courses" :key="course.id">

                          <td>{{ course.id }}</td>
                          <td>{{ course.name }}</td>
                          <td>{{ course.description }}</td>
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
   <!-- <add-course-model :show="showModel" @closed="showModel = false"></add-course-model> -->
  <app-model
        :width="400"
        :height="250"
        :show="showModel"
        @closed="showModel = false"
    >
        <div class="flex">
            <div class="rounded-sm p-4 text-black w-full mr-2" >
                <!-- Feedback Section START -->
                    <div class="section-block p-0 m-0" style="background: #f9f9f9;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                   
                                        <h5 class="py-3">Add Courses</h5>
                                        <form class="user" @submit.prevent="insertCourse" enctype="multipart/form-data">
                                            <div class="row mt-10">
                                                <input type="hidden"  v-model="form.student_id">
                                             
                                               <div class="col-md-3 col-12">
                                                   <label for="" style="padding-top: 20px;">Courses</label>
                                               </div>
                                                <div class="col-md-9 col-12 mb-3">
                                                    <select  class="form-control form-control-sm mb-3"  v-model="form.course_ids" multiple>
                                                      <option v-for="course in courses" :value="course.id" :key="course.id">
                                                        {{ course.name }}
                                                      </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="rounded-sm py-2 px-2 m-2 text-white bg-blue-600 hover:opacity-75 cursor-pointer disabled:opacity-25"
                                            >
                                                Submit
                                            </button>                                           
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Feedback Section END -->


            </div>

           
        </div>

        <div class="mt-4">
       
        </div> 
    
  </app-model>

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
 
        form:{

          student_id: null,
          course_ids : [],
        },

        showBoards: false,
        showModel: false,
        courses:[],
        searchTerm:'',
      }
    }, 
    created(){
      let id = this.$route.params.id
      axios.get('/api/student/'+id)
      .then(({data}) => (this.form = data))
      .catch(console.log('error'))
    },
  
  directives: {onClickaway},

  methods:{
    allCourses(){
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
    this.student();
    this.allCourses();
  },

  close(){
    this.$emit("closed")
  }
  

  } 
</script>

