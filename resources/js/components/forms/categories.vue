<template>
    <section class="categories container">
        <h1>{{header_text}} News Category:</h1>
        <br/>
        <br/> 
        <form method="POST" name="categories" v-bind:action="action_url" >
            
            <input type="hidden" name="_token" :value="csrf"/>
            <input v-if="checkPostmethod()" type="hidden" name="_method" v-model="post_method"/>

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input id="category_name" class="form-control" type="text" name="category_name" 
                 v-model="data.type_name" /> 
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description" 
                           v-model="data.description" rows="10" cols="10">
                    
                </textarea> 
            </div>
            
            <input type="submit" class="btn btn-primary btn-lg btn-block btn-font" name="submit" value="Submit" />
        </form>
    </section>
</template>
<script>

export default {
    name: 'categories',
    data (){
        return {
           data : {} 
        }
    },
    props : {
        header_text :{
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
        post_method : {
            type: String,
            default:"",
            required:false
        },
        data_fields:{
            type: String,
            default:"",
            required:false
        },

      
    },
    methods: {
        checkPostmethod : function(){
            return this.post_method.length > 0 ? true : false;
        },
        prepareData  : function(){
            if(this.data_fields.length > 0){
                this.data = JSON.parse(this.data_fields);
            }
        }
    },
    mounted: function(){
        this.prepareData();
    },
    computed : {
        
    }
}

</script>
<style>
   
</style>