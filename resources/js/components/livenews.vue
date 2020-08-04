<template>
    <div class="livenews">
        <livenews_header></livenews_header>
        <livenews_body></livenews_body>
    </div>
</template>
<script>
import livenews_header      from './livenews-header.vue';
import livenews_body        from './livenews-body.vue';
export default {
    name: 'livenews',
    components:{
        livenews_header ,livenews_body
    },
    data (){
        return {
            data : [],
        }
    },
    methods: {
        
  }
}

</script>
<style scoped>
    .livenews{
        flex-basis: 75%;
    }
</style>