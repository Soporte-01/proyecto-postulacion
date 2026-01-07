<script setup>
    import BotomValidar from '../components/BotomValidar.vue'
    import Validador from '../Validador.json'
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'
    
    const userInput = ref('')
    const passwordInput = ref('')
    const mostrar = ref(false)

    const router = useRouter()

    const loginExitoso = (usuario) => {
    // Guardamos sesión (muy simple)
    localStorage.setItem('auth', 'true')
    localStorage.setItem('usuario', usuario)

    router.push('/bienvenida')
    }
</script>

<template>
    <form @submit.prevent>
        <h2>Login</h2>
        <label>Usuario</label>
        <input type="text" v-model="userInput" />
        
        <label>Contraseña</label>
        <input :type="mostrar ? 'text' : 'password'" v-model="passwordInput" />
        
        <div>
            <input type="checkbox" id="mostrar" v-model="mostrar" />
            <label for="mostrar">Mostrar Contraseña</label>
        </div>
        
        <BotomValidar
        :usuarios="Validador"
        :user-input="userInput"
        :password-input="passwordInput"
        @login-exitoso="loginExitoso"
        />
        <a href="./Register">Registro</a>
    </form>
</template>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    form {
    font-family: "Roboto", sans-serif;
  display: grid;
  gap: 1rem;
  justify-items: center;
  align-items: center;
}
input[type="text"],
input[type="password"] {
  padding: 0.5rem;
  font-size: 1rem;
}
label{
    color: white;
}
a{
    color: rgb(64, 64, 255);
}
</style>
