<template>
    <section class="ads-sidebar">
        <p>Ads sidebar</p>
    </section>
</template>
<script>
export default {
    name: 'ads-main',
    data (){
        return {
            data : []
        }
    },
    methods: {
        sampleFunction : function () {
            
        }
  }
}

</script>
<style>
    .ads-sidebar{
        background-color: black ;
        max-height:100%;
        flex-basis: 25%;
    }
</style>