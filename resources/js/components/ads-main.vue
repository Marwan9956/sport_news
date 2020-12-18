<template>
    <section class="ads-main">
        <div class="container">
           <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="#" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="#" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="#" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
</template>
<script>
import $ from 'jquery'
export default {
    name: 'ads-main',
    data (){
        return {
            displayData : [],
            show : false
        }
    },
    methods: {
        beforeEnter: function (el) {
            
        },
        enter: function (el, done) {
            
        }
    },
    mounted: function(){
        
    },
    computed : {
        
    }
}

</script>
<style>
    .hide{
        display:none;
    }
    .ads-main{
        height: 380px;
        background-color: black;
    }
    .ads-main .container{
        /* background-color: #fff; */
    }
    .ads-main img{
        width:100%;
        height:100%;
    }
    #carouselExampleControls{
        width:100%;
        height:100%;
    }
    
    
</style>