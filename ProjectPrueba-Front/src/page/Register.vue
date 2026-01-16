<script setup>
import data from '../Validador.json'
import BotomRegistro from '../components/BotomRegistro.vue';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const mostrar = ref(false);
const usuarioInput = ref('');
const emailInput = ref('');
const password = ref('');
const passwordconfic = ref('');

function agregarUsuario(){
router.push('/login')
}
</script>

<template>
  <form @submit.prevent>
    <h2>Registro</h2>

    <label>Usuario</label>
    <input type="text" required v-model="usuarioInput" />

    <label>Email</label>
    <input type="email" required v-model="emailInput" />

    <label>Contraseña</label>

    <input :type="mostrar ? 'text' : 'password'" v-model="password" />

    <label>Repetir Contraseña</label>
    <input :type="mostrar ? 'text' : 'password'" v-model="passwordconfic" />

    <!-- Mensaje si las contraseñas coinciden -->
    <label v-if="password === passwordconfic && password !== ''">
      Contraseña correcta
    </label>

    <!-- Mensaje si las contraseñas no coinciden -->
    <label v-else-if="password !== '' && password !== passwordconfic">
      Escriba de nuevo la contraseña
    </label>

    <div>
      <input type="checkbox" id="mostrar" v-model="mostrar" />
      <label for="mostrar">Mostrar Contraseña</label>
    </div>
    <BotomRegistro :disabled="password != passwordconfic || password == ''"
    :usuario="usuarioInput"
    :email="emailInput"
    :password="password"
    @crear-usuario="agregarUsuario"
    ></BotomRegistro>
    <a href="./Login">Login</a>
  </form>
</template>

<style>
  form {
    display: grid;
    justify-items: center;
    align-items: center;
    gap: 5px;
    color: white;
  }
</style>
