<script setup>
import { Link } from "@inertiajs/vue3";

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
      <Link :href="`/users/${user.id}`" :data="{ teste: 'ok' }" method="delete" as="button">Deletar</Link>
    </li>
  </ul>
</template>
