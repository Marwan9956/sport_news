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
            news : [
                {
                    id :  1 ,
                    time : '08.00',
                    header: "Real Plot MAN CITY RAID",
                    text  : "Manchester City duo Kevin de Bruyne and Raheem Sterling could be at the centre of a Real Madrid raid this summer, reports Don Balon.The 13-time European champions are looking to capitalise on City’s two-season Champions League ban and will test the reigning Premier League champions’ resolve on two of their most-influential stars if the ban is upheld by the Court of Arbitration for Sport.A verdict in City’s appeal against UEFA’s punishment is expected in July."
                },
                {
                    id :  2 ,
                    time : '08.05',
                    header: "Real Plot MAN CITY RAID",
                    text  : "Manchester City duo Kevin de Bruyne and Raheem Sterling could be at the centre of a Real Madrid raid this summer, reports Don Balon.The 13-time European champions are looking to capitalise on City’s two-season Champions League ban and will test the reigning Premier League champions’ resolve on two of their most-influential stars if the ban is upheld by the Court of Arbitration for Sport.A verdict in City’s appeal against UEFA’s punishment is expected in July."
                },
                {
                    id :  3 ,
                    time : '08.20',
                    header: "Real Plot MAN CITY RAID",
                    text  : "Manchester City duo Kevin de Bruyne and Raheem Sterling could be at the centre of a Real Madrid raid this summer, reports Don Balon.The 13-time European champions are looking to capitalise on City’s two-season Champions League ban and will test the reigning Premier League champions’ resolve on two of their most-influential stars if the ban is upheld by the Court of Arbitration for Sport.A verdict in City’s appeal against UEFA’s punishment is expected in July."
                },
                {
                    id :  4 ,
                    time : '08.40',
                    header: "Real Plot MAN CITY RAID",
                    text  : "Manchester City duo Kevin de Bruyne and Raheem Sterling could be at the centre of a Real Madrid raid this summer, reports Don Balon.The 13-time European champions are looking to capitalise on City’s two-season Champions League ban and will test the reigning Premier League champions’ resolve on two of their most-influential stars if the ban is upheld by the Court of Arbitration for Sport.A verdict in City’s appeal against UEFA’s punishment is expected in July."
                },
                {
                    id :  5 ,
                    time : '09.00',
                    header: "Real Plot MAN CITY RAID",
                    text  : "Manchester City duo Kevin de Bruyne and Raheem Sterling could be at the centre of a Real Madrid raid this summer, reports Don Balon.The 13-time European champions are looking to capitalise on City’s two-season Champions League ban and will test the reigning Premier League champions’ resolve on two of their most-influential stars if the ban is upheld by the Court of Arbitration for Sport.A verdict in City’s appeal against UEFA’s punishment is expected in July."
                },
            ],
            displayData:[],
            show : false
        }
    },
    computed:{
        
    },
    methods: {
        addingNews : function(data){
            var i = 0;
            for(const prop in data){
                this.delayPush(data[prop],i)
                i++;
            }
            
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
            });
        },
        delayPush : function(item , i){
            var vm =this;
            (function(vm) {
                var time = 2000 * i;
                setTimeout(function() {
                    vm.displayData.unshift(item);
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
        }
    
        
    },
    mounted: function(){
        this.show = true;
        this.getNews();
        //this.addingNews();
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
    /*
    @keyframes slideDown{
        from {
            max-height: 0;
        }
        to {
            max-height: 500px;
        }
    }*/



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