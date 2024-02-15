<script setup>

import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const auth = computed(() => page.props.auth);

</script>

<template>
  <AppHeader title="Home"/>
  <div>
    <h1 v-if="auth?.user">Bem vindo, {{ auth.user.name }}</h1>
    <h1 v-else>Home</h1>
  </div>
</template>
