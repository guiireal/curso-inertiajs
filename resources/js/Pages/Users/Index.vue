<script setup>
defineProps({
    users: Array,
});
</script>

<template>
    <AppHeader title="Usuários"/>
    <h1>Usuários</h1>
    <ul>
        <li v-for="user in users" :key="user.id">
            {{ user.name }}
        </li>
    </ul>
</template>

<style scoped>

</style>
