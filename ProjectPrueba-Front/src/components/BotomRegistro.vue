<script setup>
import { defineProps, defineEmits } from 'vue'

const props = defineProps({
  usuarios: Array,      // Array de usuarios
  usuario: String,      // Input del usuario desde padre
  password: String      // Input de la contraseña desde padre
})

console.log(props.usuario)
console.log(props.password)

const emit = defineEmits(['crear-usuario'])

// Función para manejar registro
const manejarRegistro = () => {
  if (!props.usuario || !props.password) {
    alert('Completa todos los campos')
    return
  }

  // Buscar duplicado (ignora mayúsculas)
  const usuarioExistente = props.usuarios.find(
    u => u.usuario.toLowerCase() === props.usuario.toLowerCase()
  )

  if (usuarioExistente) {
    alert(`El usuario "${props.usuario}" ya existe`)
  } else {
    // Emitir al padre para que agregue el usuario
    emit('crear-usuario', props.usuario, props.password)
  }
}
</script>

<template>
    <button type="button" @click="manejarRegistro">
        Registrar
    </button>

</template>

<style scoped>
/* Estilos del componente BotomRegistro */
</style>
