<template>
    <section class="headlines container">
        
        <h1>{{ header_text  + ':' }} </h1>
        <br/>
        <br/> 
        
        <form method="POST" v-bind:action="action_url" name="headlines">
            <input type="hidden" name="_token" v-bind:value="csrf">
            <input v-if="checkPostMethod()" type="hidden" name="_method" v-model="post_method">

            <div class="form-group">
                <label for="text">Headlines Text</label>
                <input id="text" class="form-control" type="text" name="text" v-model="headlines_text"/> 
            </div>


            <div v-if=" news_header === true " class="form-group">
              <label>news list ID:</label>
              <select  class="custom-select" name="newsHeaderId">

                  <option selected disabled>select </option>
                  <option v-for="list in news_header_list" :key="list.id" v-bind:value="list.id"  
                      :selected="headlines_id == list.id">
                        {{ list.title }}
                  </option>

              </select>
          </div>
            <input  type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" v-bind:value="submitText()" />
            
        </form>

    </section>
</template>
<script>

export default {
    name: 'headlines',
    data (){
        return {
            headlines_text:"",
            news_header_list:""
        }
    },
    props : {
      header_text : { 
        type: String,
        default:"",
        required:false
      },
      action_url        : { 
        type: String,
        default:"",
        required:false
      },
      csrf      : { 
        type: String,
        default:"",
        required:false
      },
      headlines      : { 
        type: String,
        default:"",
        required:false
      },
      post_method:{
        type: String,
        default:"",
        required:false
      },
      news_header:{
        type:Boolean,
        default:false,
        required:false
      },
      news_header_list_prop:{
        type:String,
        default:"",
        required:false
      },
      headlines_id:{
        type:Number,
        required:false
      }
    },
    methods: {
        checkPostMethod: function(){
          return this.post_method ? true : false;
        },
        submitText : function(){
          return this.post_method ? "Submit" : "Add";
        }
    },
    mounted: function(){
        this.headlines_text = this.headlines;
        if(this.news_header){
          this.news_header_list = JSON.parse(this.news_header_list_prop);
        }
    },
    computed : {
        
    }
}

</script>
<style>
   
</style>