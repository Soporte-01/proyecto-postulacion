import { createRouter, createWebHistory } from 'vue-router'
import Login from '../page/login.vue'
import Register from '../page/Register.vue'
import Home from '../page/Home.vue'
// import Bienvenida from '../page/Bienvenida.vue'
import Show from '../page/Show.vue'
import EditCard from '../page/EditCard.vue'
import Card from '../components/card.vue'
  
const routes = [
  { path: '/', component: Login },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  // { path: '/bienvenida',component: Bienvenida,meta: { requiresAuth: true }},
  { path: '/home', component: Home,meta: { requiresAuth: true } },
  { path: '/show', component: Show,meta: { requiresAuth: true } },
  { path: '/edit', component: EditCard,meta: { requiresAuth: true } },
  { path: '/card', component: Card}

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const isAuth = localStorage.getItem('auth') === 'true'

  if (to.meta.requiresAuth && !isAuth) {
    next('/login')
  } else {
    next()
  }
})

export default router
