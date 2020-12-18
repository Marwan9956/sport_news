<template>
    <section class="news-post container">
        <h1>{{header_text}}</h1>
        <br/>
        <br/> 
        <form method="POST" v-bind:action="action_url" name="newsBody">
            
            <input type="hidden" name="_token" v-bind:value="csrf">
            <input v-if="checkPostMethod()" type="hidden" name="_method" v-model="post_method">

            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" class="form-control" type="text" name="title" 
                       v-model="old_title"/> 
            </div>

            <div class="form-group">
                <label for="Body">Body</label>
                <textarea id="Body" class="form-control" name="Body" rows="10" cols="10" 
                          v-model="old_body">
                </textarea> 
            </div>

            <div class="form-group">
                <label>news Type:</label>
                <select v-if="checkLen()" class="custom-select" name="newsType">
                    <option  selected disabled>select </option>
                    
                        <option v-for="type in getNewsTypes" :key="type.id" v-bind:value="type.id" 
                              :selected="type.id == newsTypeID"   >
                            {{type.type_name}}
                        </option>
                    
                </select>
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
        </form>
    </section>
</template>
<script>

export default {
    name: 'news-post',
    data (){
        return {
            old_title:"",
            old_body :"",
            newsTypeID:""
        }
    },
    props : {
      header_text : { 
        type: String,
        default:"",
        required:false
      },
      old_news_type :{
        type:String,
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
      title      : { 
        type: String,
        default:"",
        required:false
      },
      body_text      : { 
        type: String,
        default:"",
        required:false
      },
      news_types : { 
        type: String,
        default:"",
        required:false
      },
      post_method:{
        type: String,
        default:"",
        required:false
      }
    },
    methods: {
        checkLen : function(){
            return this.getNewsTypes.length > 0 ? true : false; 
        },
        checkPostMethod: function(){
          return this.post_method ? true : false;
        }
    },
    mounted: function(){
        this.old_title = this.title;
        this.old_body  = this.body_text;
        this.newsTypeID= this.old_news_type;
    },
    computed : {
        getNewsTypes:function(){
          return JSON.parse(this.news_types);
        }
    }
}

</script>
<style>
   
</style>