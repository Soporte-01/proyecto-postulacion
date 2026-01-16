<script  setup>
import { ref } from 'vue'
import BotomCerrarSesion from './BotomCerrarSesion.vue'
// Obtener usuario desde localStorage
const usuario = ref(localStorage.getItem('usuario'))

</script>
<template>
    <nav>
        <h3>{{ usuario }}</h3>
        <BotomCerrarSesion />
    </nav>
</template>
<style scoped>
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #4283fd;
        color: white;
    }
</style>