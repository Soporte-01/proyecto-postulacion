    <script setup>
    import { defineProps, defineEmits } from 'vue'

    const props = defineProps({
    usuarios: Array,        // Array de usuarios del JSON
    userInput: String,      // Input del usuario
    passwordInput: String   // Input de la contraseña
    })

    const emit = defineEmits(['login-exitoso'])

    function validar() {
    // Buscar un usuario que coincida con el input
    const usuarioValido = props.usuarios.find(
        u => u.user === props.userInput && u.password === props.passwordInput
    )
    
    if (usuarioValido) {
        emit('login-exitoso', usuarioValido.user)// enviamos el nombre al padre
    } else {
        alert("Usuario o contraseña incorrecta")
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
