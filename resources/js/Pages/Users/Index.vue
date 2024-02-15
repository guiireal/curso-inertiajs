<script setup>
import {Head} from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>Usuários</title>
    </Head>
    <h1>Usuários</h1>
    <ul>
        <li v-for="user in users" :key="user.id">
            {{ user.name }}
        </li>
    </ul>
</template>

<style scoped>

</style>
