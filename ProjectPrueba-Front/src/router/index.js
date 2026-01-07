import { createRouter, createWebHistory } from 'vue-router'
import Login from '../page/login.vue'
import Bienvenida from '../page/Bienvenida.vue'
import Register from '../page/Register.vue'

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', component: Login },
  {path: '/bienvenida',component: Bienvenida,meta: { requiresAuth: true }
  },
  { path: '/register', component: Register }
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
