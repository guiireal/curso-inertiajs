<script setup>
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const { auth } = page.props;
</script>

<template>
  <AppHeader title="Home"/>
  <div>
    <h1 v-if="$page.props?.auth?.user">Bem vindo, {{ auth.user.name }}</h1>
    <h1 v-else>Home</h1>
  </div>
</template>
