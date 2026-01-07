<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

// Obtener usuario desde localStorage
const usuario = ref(localStorage.getItem('usuario'))

const logout = () => {
  localStorage.removeItem('auth')
  localStorage.removeItem('usuario')
  router.push('/login')
}
</script>

<template>
  <h1>Bienvenido {{ usuario }}</h1>
  <button @click="logout">Cerrar sesión</button>
</template>



<style scoped>
h1 {
  color: rgb(194, 230, 194);
}
</style>
