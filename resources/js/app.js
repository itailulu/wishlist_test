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
    beforeCreate() { this.$store.commit('initialiseStore')},
    store 
})

store.subscribe((mutation, state) => {
    // Store the state object as a JSON string
    localStorage.setItem('users_wishlist', JSON.stringify(state.wishlist));
});