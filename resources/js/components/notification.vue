<template>
    <div class="alert notification"  :class="alert_class" v-if="display === true">

        <div class="notification-container">
            <p v-if="type === 'error'" v-for="error in getErrors" >{{ error }}</p>
            <p v-if="type === 'sucess'"> {{ sucess }}</p>
        </div>

        <button type="button" class="close" aria-label="Close" v-on:click.prevent="closeAlert">
          <span aria-hidden="true">&times;</span>
        </button>
        

    </div>
</template>

<script>




export default {
  name: 'notification',
  components:{
    
  },
  props : {
      alert_class : { 
        type: String,
        default:"",
        required:false
      },
      type        : { 
        type: String,
        default:"",
        required:false
      },
      sucess      : { 
        type: String,
        default:"",
        required:false
      },
      errors      : { 
        type: String,
        default:"",
        required:false
      }
  },
  data () {
    return {
      display : true
    }
  },
  computed:{
    getErrors:function(){
      if(this.type === 'error'  ){
        return JSON.parse(this.errors);
      }
    }
  },
  methods: {
    closeAlert: function (e) {
      $('.notification').slideUp();
      setTimeout(function(){  
        this.display = false
      }, 3000);
      
    },
    closeDefault : function(){
      var vj = this;
      setTimeout(function(){  
        if(vj.display === true){
          vj.closeAlert();
        }
      }, 4000);
    }
  },
  created (){
    this.closeDefault();
  },
  mounted : function(){
    
  }
}
</script>

<style scoped>
  .notification{
    display :flex;
  }
  .notification-container{
    flex-basis: 85%;
    flex-grow:1;
  }
  button{
    align-self: flex-start;
  }
  

</style>
