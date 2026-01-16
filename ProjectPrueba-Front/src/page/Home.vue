<script setup>
import Navbar from '../components/Navbar.vue'
import FormEmpresa from '../components/FormEmpresa.vue';

</script>

<template>
    <div class="bg">
        <Navbar></Navbar>
        <div class="content">
          <FormEmpresa></FormEmpresa>
          
        </div>
    </div>
</template>
<style scoped>
    .bg {
        height: 100vh;
        background-color: #f0f2f5;
        width: 100vw;
    }
    .content {
      display: grid;
      justify-items: center;
      align-items: center;
      width: 1fr;
    }
</style>