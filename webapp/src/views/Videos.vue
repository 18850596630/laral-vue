<template>
    <div id="home">

        <swiper class="swiper" :options="swiperOption" style="touch-action: none">
            <swiper-slide v-for="item in tags" :key="item.id">
                <router-link :to="{params:{tid: item.id},name:'Videos'}" style="color: #fff">
                    {{item.name}}
                </router-link>
            </swiper-slide>
        </swiper>
        <!--        全部视频-->
        <div id="container">
            <div class="recomend_box">
                <div class="recomend_four_cell">
                    <router-link :to="{params:{lessonId:item.id},name:'Page'}" v-for="item in lessons" :key="item.id">
                        <div class="four_cell_box rt_time">
                            <div class="cell_box_video">
                                <img :src="item.preview">
                            </div>
                            <span class="cell_rt">22:45</span>
                            <p>{{item.title}}</p>
                        </div>
                    </router-link>
                </div>
                <div style="clear:both"></div>
            </div>
            <div style="height: 62px"></div>
        </div>
        <div id="tabbar_box">
            <div class="tabbar_flex">
                <div class="tabbar_flex_cell">
                    <router-link to="/">
                        <div class="iconfont icon-shouye"></div>
                        <span style="color:#cccccc">首页</span>
                    </router-link>
                </div>
            </div>
            <div class="tabbar_flex">
                <div class="tabbar_flex_cell" style="color: #689F38">
                    <router-link to="/videos">
                        <div class="iconfont icon-shipin" style="color: #689F38"></div>
                        <span style="color: #689F38;">视频</span>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Videos',
        data() {
            return {
                tags: [],
                lessons:[],
                swiperOption: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    freeMode: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    }
                }
            }
        },
        mounted() {
            this.loadData();
        },
        methods:{
            loadData(){
                let that = this;
                this.axios.get("http://laral.jingani.cn/api/tags").then(function (res) {
                    // console.log(res);
                    if (res.status === 200) {
                        that.tags = res.data.data;
                        // console.log(res.data.data);
                    }
                });

                let tid=this.$route.params.tid;
                this.axios.get("http://laral.jingani.cn/api/lesson/" + (tid ? tid : 0)).then(function (res) {
                    if (res.status === 200) {
                        that.lessons=res.data.data;
                    }
                })
            }
        },
        watch:{
            '$route':'loadData'  //路由地址发生变化  执行此方法
        }
    }
</script>

<style scoped>

    /*导航条*/
    .swiper-container {
        background-color: #689F38;
        height: 40px;
        line-height: 40px;
        text-align: center;
        color: #ffffff;
    }

    #home {
        height: 100vh;
        width: 100%;
        position: relative;
    }

    #container {
        height: 92vh;
    }

    a {
        text-decoration: none !important;
    }

    /*底部固定导航*/
    #tabbar_box {
        display: flex;
        position: fixed;
        width: 100%;
        height: 60px;
        bottom: 0;
        left: 0;
        background-color: #ffffff;
        box-shadow: 0 2px 3px 3px #eeeeee;
    }

    #tabbar_box .tabbar_flex {
        flex: 1;
    }

    .tabbar_flex_cell {
        width: 50px;
        height: 100%;
        margin: auto;
        text-align: center;
    }

    .tabbar_flex_cell .iconfont {
        font-size: 28px;
        color: #cccccc;
    }


    .recomend_box img {
        width: 100%;
        min-height: 100%;
    }

    .recomend_box {
        width: 96%;
        margin: auto;
        background-color: #ffffff;
    }

    .recomend_box .recomend_four_cell .four_cell_box {
        width: 49%;
        float: left;
        height: 15.5rem;
        border-radius: 4px;
        overflow: hidden;
        margin: 0.5rem auto;
        text-align: center;
    }

    .recomend_box .four_cell_box:nth-child(2n) {
        margin-left: 2%;
    }

    .recomend_box .recomend_four_cell .rt_time {
        position: relative;
    }

    .cell_box_video {
        width: 100%;
        height: 12.5rem;
    }

    .recomend_box .four_cell_box .cell_rt {
        position: absolute;
        right: 1%;
        top: 2%;
        color: #f0f3f5;
        display: block;
        width: 40px;
        height: 21px;
        background: rgba(133, 138, 38, 0.53);
        border-radius: 4px;
        font-size: 12px;
        padding: 2px 5px;
    }

    .recomend_box .four_cell_box p {
        font-size: 12px;
        width: 100%;
        height: 30px;
        line-height: 30px;
        color: #0C0C0C;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }
</style>