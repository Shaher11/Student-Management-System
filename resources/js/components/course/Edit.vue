


<template>
  
  <div>

 <div class="row">
  <router-link to="/courses" class="btn btn-primary">All Courses </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Course</h1>
                  </div>

      <form class="user" @submit.prevent="courseUpdate" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputFirstName" placeholder=" First Name" v-model="form.first_name">
            <small class="text-danger" v-if="errors.first_name"> {{ errors.first_name[0] }} </small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputMiddleName" placeholder="Middle Name" v-model="form.middle_name">
            <small class="text-danger" v-if="errors.middle_name"> {{ errors.middle_name[0] }} </small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputLastName" placeholder="Last Name" v-model="form.last_name">
            <small class="text-danger" v-if="errors.last_name"> {{ errors.last_name[0] }} </small>
        </div>

        <div class="form-group">
            <input type="email" class="form-control" id="exampleInputFirstName" placeholder="Enter Email" v-model="form.email">
            <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
        </div>
  
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
        </div>
        
      </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    return {
       form:{
        level_id: '',
        program_id: '',
        identifier: '',
        first_name: '',
        middle_name: '',
        last_name: '',
        email: '',
        birthdate: '',
        // gender: null,
      },
      errors:{}
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/student/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },

  methods:{
    // onFileSelected(event){
    //  let file = event.target.files[0];
    //  if (file.size > 1048770) {
    //   Notification.image_validation()
    //  }else{
    //   let reader = new FileReader();
    //   reader.onload = event =>{
    //     this.form.newphoto = event.target.result
       
    //   };
    //   reader.readAsDataURL(file);
    //  }

    // },

    studentUpdate(){
        let id = this.$route.params.id
        axios.patch('/api/student/'+id,this.form)
        .then(() => {
          this.$router.push({ name: 'students'})
          Notification.success()
        })
        .catch(error =>this.errors = error.response.data.errors)
    },
  } 


  }
   
</script>


<style type="text/css">
	
</style>