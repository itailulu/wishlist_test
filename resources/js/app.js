import './bootstrap'
import Vue from 'vue'
import router from './router'
import store from './store'
import Home from './Views/Home.vue'
import CoreuiVue from '@coreui/vue'

Vue.use(CoreuiVue);

const app = new Vue({
    components: {
        Home
    },
    el: "#app",
    router,
    store 
})