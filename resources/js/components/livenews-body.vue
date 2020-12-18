<template>
    <div class="livenews-body">
        <div v-if="show">
            <transition-group
                v-on:before-enter="beforeEnter"
                v-on:enter="enter"
                v-bind:css="false"
            >
                <div class="news-block" v-for=" item in displayData" :key="item.id">
                    <section  class="news-item" >
                        <div class="time">{{ displayTime(item.created_at) }}</div> 
                        <div class="news-body">
                            <h2>{{item.title}}</h2>
                            <p>{{item.body}}</p>
                        </div>
                    </section>
                </div>
            </transition-group>
        </div>
        
    </div>
</template>
<script>
import $ from 'jquery'
export default {
    name: 'livenews-body',
    data (){
        return {
            displayData:[],
            lastId:0,
            timeToInterval : 0,
            show : false,
            newCall:false
        }
    },
    computed:{
        
    },
    methods: {
        addingNews : function(data){
            var i = 0;
            this.timeToInterval = data.length;
            for(const prop in data){
                this.delayPush(data[prop],i);
                i++;
            }
            console.log(this.timeToInterval);
            this.newCall=true;
            
        },
        getNews   : function(){
            // Make a request for a user with a given ID
            var url= 'http://' + window.location.hostname  +'/public/news/fetch';
            var vr= this;
            axios.get(url)
            .then(function (response) {
                // handle success
                vr.addingNews(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
                vr.newCall = true;
                console.log('yes Done');
            });
        },
        getMoreNews : function(){
            var url= 'http://' + window.location.hostname  +'/public/news/fetch/' + this.lastId;
            var vr= this;
            this.newCall = false;
            axios.get(url)
            .then(function (response) {
                // handle success
                
                if(response.data.length === 0){
                    console.log(vr.lastId);
                    console.log(response.data);
                }
                vr.addingNews(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
                vr.newCall = true;
            });
        },
        delayPush : function(item , i){
            var vm =this;
            (function(vm) {
                var time = 2000 * i;
                setTimeout(function() {
                    vm.displayData.unshift(item);
                    vm.lastId= item.id;
                }, time);
            })(vm);
        },
        displayTime : function(date){
            //Display time in HH:MM format from 0000/00/00 00-00-00
            var start = date.length - 8;
            return date.substr(start,5);
        },
        beforeEnter: function (el) {
            //console.log(el);
            //el.style.height = 0;
            //el.style.opacity=0;
        },
        enter: function (el, done) {
            $(el).slideDown('slow');
            done();
        },
    
        
    },
    mounted: function(){
        //this for animation to work properly
        this.show = true;
        this.getNews();
        var vr = this;
         
        
        //console.log(this.timeToInterval);
        //SetTimeout for setInterval
        setInterval(function(){
            if(vr.newCall == true){
                var time = vr.timeToInterval * 2500;
                console.log('timeinterval is ' + vr.timeToInterval);
                setTimeout(function(){ 
                    vr.timeToInterval = 0;
                    vr.getMoreNews(); 
                }, time);
            } 
        }, 10000);
        
        
    },
    created (){
        
    }
}

</script>
<style scoped>
    .livenews-body{
        margin-top: 60px;
    }
    .news-block{
        display:none;
        margin: 60px 0;
    }
    .news-item{
        display:flex;
        flex-wrap: nowrap;
        align-items: start;
    }
    



    .time{
        flex-basis: 12%;
        flex-grow:1;
        box-sizing: border-box;
        color:#808080;
        font-size: 1.2em;
    }

    .news-body{
        flex-grow: 1;
        flex-basis: 88%;
        box-sizing: border-box;
        padding-left: 20px;
        padding-right: 45px;
        text-align: left;
    }
    h2{
        margin:0;
        margin-bottom: 25px;
        font-size:1.3em;
        font-weight: 500;
        text-align: left;
        color:#555555;
    }

    p{
        color:#2c2c2c;
        line-height: 160%;
        text-align: justify;
    }
</style>