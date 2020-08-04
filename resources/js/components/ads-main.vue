<template>
    <section class="ads-main">
        <div class="container">
            <!--
            <div v-for="item in displayData" :key="item.name">{{item.name}}</div> 
            
            <div v-if="show">
                <transition-group
                    v-on:before-enter="beforeEnter"
                    v-on:enter="enter"
                    v-bind:css="false"
                >
                    <div v-for="item in displayData" :key="item.name" class="hide">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                </transition-group>
            </div>
            -->
        </div>
    </section>
</template>
<script>
import $ from 'jquery'
export default {
    name: 'ads-main',
    data (){
        return {
            items :[
                { name : 'first'},
                { name : 'second'},
                { name : 'third'},
                { name : 'fourth'},
                { name : 'fifth'},
                { name : 'sixth'},
            ],
            displayData : [],
            show : false
        }
    },
    methods: {
        sampleFunction : function () {
            var i = 0;
            for(const prop in this.items){
                this.delayPush(this.items[prop],i)
                i++;
            }
        },
        delayPush  : function(item,i){
            var vm =this;
            (function(vm) {
                var time = 500 * i;
                setTimeout(function() {
                    vm.displayData.unshift(item);
                }, time);
            })(vm);
        },
        beforeEnter: function (el) {
            //console.log(el);
            //el.style.height = 0;
            //el.style.opacity=0;
        },
        enter: function (el, done) {
            console.log(el.scrollHeight);
            //element.
            //el.style.opacity = 0;
            /*
            el.animate([
                // keyframes
                { opacity: '0' }, 
                { opacity: '1' }
                ], { 
                // timing options
                duration: 1000
            });
            */
            $(el).slideDown();
            
            done();
        }
    },
    mounted: function(){
        this.sampleFunction();
        this.show = true;
    },
    computed : {
        getDisplayData(){
            return this.displayData;
        }
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
        background-color: #fff;
    }
    .slide{
        animation: slide 0.5s;
    }
    .fade-leave-active{
        animation: slide .5s reverse;
    }
    @keyframes slide{
        0%{
            transform:scale(0);
        }
        50%{
            transform:scale(1.5);
        }
        100%{
            transform:scale(1);
        }
    }
</style>