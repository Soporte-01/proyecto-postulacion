<script  setup>
    import { ref, onMounted } from 'vue'
    import axios from 'axios'
    import BotomRegisterEmpresa from './BotomRegisterEmpresa.vue'

    const mostrarFormulario = ref(false)
    const cargando = ref(true)
    const nameinput = ref('')
    const emailinput = ref('')
    const url_sitio_web = ref('')
    const url_logo = ref(null)

    function onFileChange(event) {
        url_logo.value = event.target.files[0]
        }

    // obtener id del usuario
    const usuario_id = localStorage.getItem('id')

    const verificarEmpresa = async () => {
    if (!usuario_id) {
        console.warn('No hay usuario logueado')
        cargando.value = false
        return
    }

    try {
        const response = await axios.get(
        `http://127.0.0.1:8000/api/userEmpresa/idbyempresa/${usuario_id}`
        )

        mostrarFormulario.value = !response.data.tieneEmpresa
        localStorage.setItem('id_empresa', response.data.empresa.empresa_id)
    } catch (error) {
        console.error('Error al verificar empresa:', error)
        // por seguridad, permitir registrar
        mostrarFormulario.value = true
    } finally {
        cargando.value = false
    }
    }

    onMounted(() => {
    verificarEmpresa()
    })
</script>
<template>
    <div v-if="cargando">
        Verificando empresa...
    </div>
    <form v-else-if="mostrarFormulario">
        <h2>ingrese la empresa</h2>
        <label for="">nombre</label>
        <input type="text" v-model="nameinput">

        <label for="">logo</label>
        <input type="file" @change="onFileChange">

        <label for="">email</label>
        <input type="email" v-model="emailinput">

        <label for="">sitio web</label>
        <input type="url" v-model="url_sitio_web">

        <BotomRegisterEmpresa
        :name="nameinput"
        :url_logo="url_logo"
        :email="emailinput"
        :sitio_web="url_sitio_web"
        />
    </form>
    <!-- <div v-else>
        Ya tienes una empresa registrada.
    </div> -->
</template>
<style scoped>
    form {
        background-color: #4283fd;
        display: grid;
        gap: 1rem;
        justify-items: center;
        align-items: center;
        padding: 1rem;
    }
    input[type="text"] {
        padding: 0.5rem;
        font-size: 1rem;
    }
</style>