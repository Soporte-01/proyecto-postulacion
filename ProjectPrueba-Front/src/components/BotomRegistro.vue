<script setup>
import { defineProps, defineEmits } from 'vue'
import axios from 'axios'

const props = defineProps({   
  usuario: String, 
  email: String,      // Input del email desde padre
  password: String      // Input de la contraseña desde padre
})


const emit = defineEmits(['crear-usuario'])

// Función para manejar registro
async function manejarRegistro () {
  try {
    const respuesta = await axios.post('http://localhost:8080/api/usuarios',
      {
        name: props.usuario,
        password: props.password,
        email: props.email
      }
    )

    alert(respuesta.data.message || 'Usuario creado correctamente')

    // opcional: notificar al padre
    emit('crear-usuario', respuesta.data.user)

  } catch (error) {
  if (error.respuesta) {
    if (error.respuesta.status === 422) {
      const errors = error.respuesta.data.errors
      if (errors?.email) {
        alert('El email ya está registrado')
        return
      }
    }

    alert(error.respuesta.data.message || 'Error al registrar')
  } else {
    alert('Error de conexión')
  }
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