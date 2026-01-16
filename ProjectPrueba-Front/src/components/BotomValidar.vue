    <script setup>
    import { defineProps, defineEmits } from 'vue'
    import axios from 'axios'

    const props = defineProps({
    // usuarios: Array,        // Array de usuarios del JSON
    userInput: String,      // Input del usuario
    passwordInput: String   // Input de la contraseña
    })

    const emit = defineEmits(['login-exitoso'])

    async function validar() {
        try {
            const respuesta = await axios.post('http://127.0.0.1:8000/api/login',
            {
                name: props.userInput,
                password: props.passwordInput
            })
            if (respuesta.data.success) {
                alert("Usuario o contraseña incorrectos")
            } else {
                emit('login-exitoso', props.userInput, respuesta.data.user.id)
            }
        } catch (error) {
            if (error.response && error.response.status === 401) {
            alert('Usuario o contraseña incorrectos')
            } else {
            alert('Error del servidor')
            }
        }
    }
    </script>

    <template>
    <button type="button" @click.prevent="validar">
        Validar
    </button>
    </template>

    <style scoped>
    button {
    padding: 0.5rem 1rem;
    font-size: 1rem;
    cursor: pointer;
    }
    </style>
