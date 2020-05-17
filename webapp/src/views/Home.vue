<template>
    <div id="home">
        <div id="container">
            <div v-swiper:mySwiper="swiperOption">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" :key="item.id" v-for="item in slides" style="touch-action: none">
                        <router-link to="/videos">
                            <img :src="item.path">
                        </router-link>
                    </div>
                </div>
<!--                <div class="swiper-pagination"></div>-->
            </div>
            <!--    推荐视频-->
            <div class="recomend_box">
                <div class="head_title">
                    <h4><span class="title_ly"></span>推荐视频<span class="title_ry"></span></h4>
                </div>
                <div class="recomend_four_cell">
                    <div class="four_cell_box rt_time" v-for="(item,index) in comendLesson" :key="index">
                        <router-link :to="{params:{lessonId:item.id},name:'Page'}">
                            <img :src="item.preview">
                            <span class="cell_rt">22:45</span>
                        </router-link>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>

            <!--    推荐视频-->
            <div class="recomend_box">
                <div class="head_title">
                    <h4><span class="title_ly"></span>热门视频<span class="title_ry"></span></h4>
                </div>
                <div class="three_r_box">
                    <div class="three_r_cell" v-for="(item,index) in hotLesson" :key="index">
                        <router-link :to="{params:{lessonId:item.id},name:'Page'}">
                            <img :src="item.preview">
                        </router-link>
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <a href="#" class="return_top"></a>
            <div style="height: 65px"></div>
        </div>
        <!--        底部 Tabbar-->
        <div id="tabbar_box">
            <div class="tabbar_flex">
                <div class="tabbar_flex_cell" style="color: #689F38">
                    <router-link to="/">
                        <div class="iconfont icon-shouye" style="color:#689F38"></div>
                        <span style="color:#689F38">首页</span>
                    </router-link>
                </div>
            </div>
            <div class="tabbar_flex">
                <div class="tabbar_flex_cell">
                    <router-link to="/videos">
                        <div class="iconfont icon-shipin"></div>
                        <span style="color: #cccccc;">视频</span>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // @ is an alias to /src
    export default {
        name: 'Home',
        data() {
            return {
                slides: [
                    {id: 1, path: require("@/assets/images/5.jpg")},
                    {id: 2, path: require('@/assets/images/2.jpg')},
                    {id: 3, path: require('@/assets/images/3.jpg')}
                ],
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                    },
                },
                comendLesson:[],   //推荐视频
                hotLesson:[],   //热门视频
            }
        },
        mounted() {
            this.mySwiper.slideTo(3, 1000, false);
            let that=this;

            this.axios.get('http://laral.jingani.cn/api/commonLesson/4').then(function (response) {
                that.comendLesson=response.data.data;
            });

            this.axios.get('http://laral.jingani.cn/api/hotLesson/3').then(function (response) {
                that.hotLesson=response.data.data;
            })

        }
    }
</script>

<style scoped>
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

    /*视频推荐*/
    .recomend_box img {
        width: 100%;
        min-height: 100%;
    }

    .recomend_box {
        width: 96%;
        margin: auto;
        background-color: #ffffff;
    }

    .recomend_box .head_title {
        height: 80px;
        text-align: center;
    }

    .recomend_box .head_title h4 {
        height: 100%;
        line-height: 80px;
        color: #0C0C0C;
    }

    .recomend_box .head_title span {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50px;
        background-color: #0C0C0C;
    }

    .recomend_box .head_title .title_ly {
        margin-right: 30px;
    }

    .recomend_box .head_title .title_ry {
        margin-left: 30px;
    }

    .recomend_box .recomend_four_cell .four_cell_box {
        width: 49%;
        float: left;
        height: 13.5rem;
        border-radius: 4px;
        overflow: hidden;
        margin: 0.5rem auto;
    }

    .recomend_box .four_cell_box:nth-child(2n) {
        margin-left: 2%;
    }

    .recomend_box .recomend_four_cell .rt_time {
        position: relative;
    }

    .recomend_box .four_cell_box .cell_rt {
        position: absolute;
        right: 1%;
        top: 2%;
        color: #f0f3f5;
        display: inline-block;
        background: rgba(133, 138, 38, 0.53);
        border-radius: 4px;
        font-size: 12px;
        padding: 2px 5px;
    }


    /*热门视频*/
    .recomend_box .three_r_box {
        width: 100%;
        float: left;
    }

    .recomend_box .three_r_cell {
        width: 38%;
        height: 12rem;
        overflow: hidden;
        border-radius: 4px;
        float:left;
        margin-left: 2%;
    }

    .recomend_box .three_r_cell:first-child{
        width: 60%;
        height: 25rem;
        overflow: hidden;
        border-radius: 4px;
        margin-left:0px;
    }

    .recomend_box .three_r_cell:last-child {
        margin-top: 1rem;
    }

    .recomend_box .recomend_content_title {
        width: 100%;
        color: #0C0C0C;
        font-weight: 500;
        height: 35px;
        line-height: 35px;
    }

    .recomend_box .recomend_content_title .content_title_tag {
        float: right;
        padding: 0 12px;
        background-color: #689F38;
        border-bottom-right-radius: 15px;
        color: #f0f3f5;
    }
    .recomend_box .recomend_content_title .content_title_ms {
        display: inline-block;
        float: left;
        width: 62%;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .return_top{
        display: block;
        border-top: 1px solid #eeeeee;
        width: 100%;
        height:10px;
    }
</style>
