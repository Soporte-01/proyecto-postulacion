<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const logout = () => {
  localStorage.removeItem('auth')
  localStorage.removeItem('usuario')
  localStorage.removeItem('id')
  localStorage.removeItem('id_empresa')
  router.push('/login')
}
</script>
<template>
    <button @click="logout">Cerrar sesión</button>
</template>
<style  scoped>

</style>