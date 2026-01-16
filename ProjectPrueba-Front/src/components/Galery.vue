<script setup>
import { ref, onMounted } from 'vue'
import Card from './card.vue'
import axios from 'axios'

const id_empresa = ref(localStorage.getItem('id_empresa'))
const users = ref([])
console.log(id_empresa.value)

const getUsersByEmpresa = async () => {
    try {
        const response = await axios.get(
            `http://127.0.0.1:8000/api/userEmpresa/idbyuser/${id_empresa.value}`
        )
        users.value = response.data
        console.log(response.data)
    } catch (error) {
        console.error('Error de sistema', error)
    }
}

onMounted(() => {
    getUsersByEmpresa()
})
</script>

<template>
    <div v-if="id_empresa!==null">

        <Card
            v-for="user in users"
            :key="user.id"
            :id_user="user.id"
        />
    </div>
</template>
<style scoped></style>