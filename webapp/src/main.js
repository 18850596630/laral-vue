import Vue from 'vue'
import App from './App.vue'
import router from './router'

import VideoPlayer from 'vue-video-player'

require('video.js/dist/video-js.css');
require('vue-video-player/src/custom-theme.css');
Vue.use(VideoPlayer);

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
Vue.use(VueAwesomeSwiper);

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios,axios);

Vue.config.productionTip = false;

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
