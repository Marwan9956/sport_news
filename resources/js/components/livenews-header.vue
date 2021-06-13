<template>
    <div class="livenews-header">
        <header>
            <h1>Transfer Center: {{newsHeader}}</h1>
            <h1>LIVE!</h1>
            <p class="head-text">{{newsHeader}}</p>
        </header>
        <div class="transfer-headlines">
            <h3>Transfer Headlines</h3>
            <ul>
                <li v-for="item in data" :key="item.id"><a href="#">{{item.text}}</a></li>
                
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    name: 'livenews-header',
    data (){
        return {
            data : [],
            newsHeader : '',
            extraString:`<li><a href="#">Chelsea want to sign Havertz</a></li>
                <li><a href="#">Papers: Liverpool in for $110m Traore Neves </a></li>
                <li><a href="#">Papers: Dortmund confident on Bellingham  </a></li>
                <li><a href="#">Edouard targets 10 straight titles at Celtic </a></li>
                <li><a href="#">Lallana signs short-term Liverpool deal   </a></li>
                <li><a href="#">Man City interested in signing Chilwell   </a></li>
                <li><a href="#">Ole: I wan't buy rotten apples at Man Utd </a></li>
                <li><a href="#">FA in talks to move window to August till October </a></li>
                <li><a href="#">Club rumours : Liverpool , Man City , Chelsea , Newcastle </a></li>
                <li><a href="#">Club rumours: Spurs , Arsenal , Man Utd       </a></li>
                <li><a href="#">$18 Premier League and Football channel offer </a></li>`
        }
    },
    methods: {
        getHeadlines   : function(){
            // Make a request for a user with a given ID
            var url= 'http://' + window.location.hostname + '/public/news/headlines/fetch';
            var vr= this;
            axios.get(url)
            .then(function (response) {
                // handle success
                //console.log(response.data);
                vr.addHeadlines(response.data);
                //vr.addingNews(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        },
        addHeadlines    :function(newData){
            //console.log(typeof newData);
            for(var index in newData){
                console.log(newData[index]);
                this.data.push(newData[index]);
            }
        },
        getNewsHeader    :function(){
            // Make a request for a user with a given ID
            var url= 'http://' + window.location.hostname + '/public/news/headertext/fetch';
            var vr= this;
            axios.get(url)
            .then(function (response) {
                // handle success
                vr.newsHeader = response.data;
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        }
    },
    mounted : function(){
        this.getHeadlines();
        this.getNewsHeader();
        //console.log(window.location.hostname);
    }
}

</script>
<style scoped>
    .livenews-header{
        text-align: left;
        font-family: 'Lucida Sans' ,Geneva , sans-serif;
        letter-spacing: -1.6px;
    }
    header{
        padding-left: 20px;
        margin-top: 60px;
    }
    h1{
        font-size: 1.6em;
        color:#474747;
        font-weight: 500;
        padding: 4px 0px ;
        padding-right: 110px;
        margin:0;
    }
    p{
        padding:0;
        margin:45px 0;
        color:#7d7d7d;
        font-size: 1.2em;
        padding-right: 140px;
    }
    .transfer-headlines{
        padding-left: 20px;
        background-color: #f5f5f5;
    }
    h3{
        color:#3a3a3a;
        margin: 20px 0 40px 0;
        padding-top:40px;
        font-size:1.2em;
    }

    li{
        color:#315ba7;
        display: block;
        margin-bottom: 6px;
    }

    a{
        color:#315ba7;
        text-decoration: none;
    }

    a:hover{
        color:#274988;
    }

    ul{
        padding-bottom: 65px;
    }
</style>