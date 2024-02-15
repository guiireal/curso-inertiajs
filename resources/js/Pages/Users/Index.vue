<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

defineProps({
  users: Array,
});

const page = usePage();

const message = computed(() => page.props.flash.success);

</script>

<template>
  <AppHeader title="Usuários"/>
  <h1>Usuários</h1>
  <div v-if="message" class="alert alert-success">
    {{ message }}
  </div>

  <ul>
    <li v-for="user in users" :key="user.id">
      {{ user.name }}
      <Link :href="`/users/${user.id}`" :data="{ teste: 'ok' }" method="delete" as="button">Deletar</Link>
    </li>
  </ul>
</template>
