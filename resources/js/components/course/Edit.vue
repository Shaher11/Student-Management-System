


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
                    <h1 class="h4 text-gray-900 mb-4">Edit Course</h1>
                  </div>

      <form class="user" @submit.prevent="courseUpdate" enctype="multipart/form-data">

        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputFirstName" placeholder=" Course Name" v-model="form.name">
            <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="exampleInputMiddleName" placeholder="Course Code" v-model="form.code">
            <small class="text-danger" v-if="errors.code"> {{ errors.code[0] }} </small>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputLastName" placeholder="Code Description" v-model="form.description">
            <small class="text-danger" v-if="errors.description"> {{ errors.description[0] }} </small>
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
        name: '',
        code: '',
        description: '',
      },
      errors:{}
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/course/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
  },

  methods:{
    courseUpdate(){
        let id = this.$route.params.id
        axios.patch('/api/course/'+id,this.form)
        .then(() => {
          this.$router.push({ name: 'courses'})
          Notification.success()
        })
        .catch(error =>this.errors = error.response.data.errors)
    },
  } 


}
   
</script>


<style type="text/css">
	
</style>