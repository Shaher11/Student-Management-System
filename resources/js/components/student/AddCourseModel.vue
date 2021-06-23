<template>
    <app-model
        :width="400"
        :height="250"
        :show="show"
        @closed="$emit('closed')"
    >
        <div class="flex">
            <div class="rounded-sm p-4 text-black w-full mr-2" >
                <!-- Feedback Section START -->
                    <div class="section-block p-0 m-0" style="background: #f9f9f9;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                   
                                        <h5 class="py-3">Add Courses</h5>
                                        <form id="addSubjectForm" method="post" action="" class="feedback-form" autocomplete="off">
                                            <div class="row mt-10">
                                                <input type="hidden" name="" value="">
                                             
                                               <div class="col-md-3 col-12">
                                                   <label for="" style="padding-top: 20px;">Courses</label>
                                               </div>
                                                <div class="col-md-9 col-12 mb-3">
                                                    <select  class="form-control form-control-sm mb-3" v-model="form.course_ids" multiple>
                                                      <option v-for="course in courses" :value="course.id" :key="course.id">
                                                        {{ course.name }}
                                                      </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button
                                                @click="addBoard"
                                                :disabled="cannotCreate"
                                                class="rounded-sm py-2 px-2 m-2 text-white bg-blue-600 hover:opacity-75 cursor-pointer disabled:opacity-25"
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
</template>

<script>
import Model from "../Model.vue";


export default {
    props: {
        show: Boolean
    },

    components: {
        appModel: Model,
    },

  data(){
    return {
      courses:[],

      form:{
        first_name: null,
        middle_name: null,
        last_name: null,
        email: null,
        identifier: null,
        level_id: null,
        program_id: null,
        birthdate: null,
        course_ids : [],
      },
      errors:{}
    }
  }, 

  methods: {
    allCourses(){
      axios.get('/api/course/')
      .then(({data}) => (this.courses = data))
      .catch()
  },

  creared(){
    this.allCourses();
  },

        // addBoard() {
        //     const self = this;
        //     this.$apollo.mutate({
        //         mutation: BoardAdd,
        //         variables: {
        //             title: this.title,
        //             color: this.color
        //         },
        //         update(store, { data: { boardAdd } }) {
        //             const data = store.readQuery({
        //                 query: UserBoards,
        //                 variables: { userId: self.userId }
        //             });
        //             data.userBoards.push(boardAdd);
        //             store.writeQuery({
        //                 query: UserBoards,
        //                 data,
        //                 variables: { userId: self.userId }
        //             });
        //             self.$emit("closed");
        //         }
        //     });
        // }
    }
};
</script>

<style scoped>
.title {
    background-color: hsla(0, 0%, 100%, 0);
}
.title:hover,
.title:focus {
    background-color: hsla(0, 0%, 100%, 0.2);
}
</style>
