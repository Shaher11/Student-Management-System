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
                          <td>{{ course.pivot.work_out}}</td>
                          <td>{{ course.pivot.activity_out}}</td>
                          <td>{{ course.pivot.final_out}}</td>
                          <!--  count work_out, activity_out, final_out-->
                          <td>
                            <!-- <span v-if='course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out > 100'  class="badge badge-pill badge-success"> {{ course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out }} </span> -->
                            
                            
                            
                            
                            <span v-if='course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out > 100'  class="badge badge-pill badge-success"> {{ course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out }} </span>
                            <span v-else-if=' 50 >= course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out'  class="badge badge-pill badge-danger"> {{ course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out }} </span>
                            <span v-else class="badge badge-pill badge-warning"> {{ course.pivot.work_out + course.pivot.activity_out + course.pivot.final_out }} </span>

                          </td>    
                  
                          <td>
                            <!-- <router-link :to="{name: 'student-profile', params:{id:student.id}}" class="btn btn-sm btn-info">Show</router-link> -->
                            <button @click="editing = true"  class="btn btn-sm btn-primary">Edit</button>
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
                                                <input type="hidden" >
                                             
                                               <div class="col-md-3 col-12">
                                                   <label for="" style="padding-top: 20px;">Courses</label>
                                               </div>
                                                <div class="col-md-9 col-12 mb-3">
                                                    <select  class="form-control form-control-sm mb-3"  v-model="student.course_ids" multiple>
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
        // editing:false,
        editOffset: -1,
        editGrade: {},
        editGadeOri: {},

        student:{
          course_ids:[]
        },
        showBoards: false,
        showModel: false,
        searchTerm:'',
        courses:[]
      }
    }, 
    // mounted(){
    //     this.$refs.card.focus();
    // },
  
  directives: {onClickaway},

  methods:{
    allCourses(){
      axios.get('/api/course/')
      .then(({data}) => (this.courses = data))
      .catch()
    },
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

    startEditing(index) {
      this.editOffset = index
      this.editGrade = this.posts[index]
      this.editGradeOri = JSON.parse(JSON.stringify(this.editPost))
      // set focus ke element input
      this.$nextTick(function(){
        console.log('item-user-'+this.editOffset)
        document.getElementById('item-user-'+this.editOffset).focus()
      }.bind(this))
    },
    updatePost() {
      this.editOffset = -1
      this.editPostOri = {}
      this.editPost = {}
    },
    cancelEditing() {
      this.$set(this.posts, this.editOffset, this.editPostOri)
      this.editOffset = -1
      this.editPostOri = {}
      this.editPost = {}
    }

  },

  created(){
    this.getStudent();
    this.allCourses();
  },

  close(){
    this.$emit("closed")
  }
  

  } 
</script>

