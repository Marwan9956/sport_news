<template>
  <div id="app-inside" >
    <adsmain></adsmain>
    <div class="two-col">
      <livenews></livenews>
      <adssidebar></adssidebar>
    </div>
  </div>
</template>

<script>


import adsmain      from './ads-main.vue';
import livenews     from './livenews.vue';
import adssidebar  from './ads-sidebar.vue';


export default {
  name: 'app',
  components:{
    adsmain,
    livenews,
    adssidebar
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  methods: {
    showAdvice: function (advice) {
      this.msg = advice;
    }
  },
}
</script>

<style>

#app-inside {
  font-family: "Lucida Sans" , 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin-top: 40px;
}



h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

.container{
  margin: 0 auto;
  width:865px;
  height:100%;
}

.two-col{
  flex: 1;
  margin: 0 auto;
  width:865px;
  display: flex;
  justify-content: center;
  
  box-sizing: border-box;
  

}
</style>
