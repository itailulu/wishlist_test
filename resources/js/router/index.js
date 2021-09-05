import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../Views/Home'
import Email from '../Views/Email'
import Success from '../Views/Success'
import NotFound from '../Views/NotFound'

Vue.use(VueRouter)

const routes = [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
        path: '/email',
        name: 'Email',
        component: Email
    },
    {
        path: '/success',
        name: 'Success',
        component: Success
    },
    { 
      path: '/:catchAll(.*)', 
      component: NotFound,
      name: 'NotFound'
    }
  ]
  
  const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
  })
  
  export default router