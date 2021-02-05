import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Clubes from '../views/Clubes.vue'
import Socios from '../views/Socios.vue'
import SociosList from '../views/SociosList.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/clubes',
    name: 'Clubes',
    component: Clubes
  },
  {
    path: '/socios',
    name: 'Socios',
    component: Socios
  },
  {
    path: '/socios/list',
    name: 'Socios',
    component: SociosList
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
