


<template>
  
  <div>

 <div class="row">
  <router-link to="/students" class="btn btn-primary">All Students </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Student</h1>
                  </div>

      <form class="user" @submit.prevent="studentInsert" enctype="multipart/form-data">

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
            <input type="number" class="form-control" id="exampleInputFirstName" placeholder="Enter Idintifier" v-model="form.identifier">
            <small class="text-danger" v-if="errors.identifier"> {{ errors.identifier[0] }} </small>
        </div> 
   
        <div class="form-group">
            <input type="date" class="form-control" id="exampleInputFirstName" placeholder="Enter Birth Date" v-model="form.birthdate">
            <small class="text-danger" v-if="errors.birthdate"> {{ errors.birthdate[0] }} </small>
        </div>

        <!-- <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">Gender</legend>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Female</label>
                    </div>
                
                </div>
            </div>
        </fieldset> -->


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
        level_id: null,
        program_id: null,
        identifier: null,
        first_name: null,
        middle_name: null,
        last_name: null,
        email: null,
        birthdate: null,
        // gender: null,
      },
      errors:{}
    }
  }, 

  methods:{
    studentInsert(){
       axios.post('/api/student',this.form)
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