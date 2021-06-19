


<template>
  
  <div>

 <div class="row">
  <router-link to="/programs" class="btn btn-primary">All Programs </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Program</h1>
                  </div>

      <form class="user" @submit.prevent="programInsert" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputFirstName" placeholder=" Program Name" v-model="form.name">
            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
        </div>
     
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputLastName" placeholder="Program Description" v-model="form.description">
            <small class="text-danger" v-if="errors.description"> {{ errors.description[0] }} </small>
        </div>



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
        name: null,
        description: null,
   
      },
      errors:{}
    }
  }, 

  methods:{
    programInsert(){
       axios.post('/api/program',this.form)
       .then(() => {
        this.$router.push({ name: 'programs'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  }



} 
</script>


<style type="text/css">
	
</style>