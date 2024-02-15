<script setup>

import { useForm } from "@inertiajs/vue3";

const form = useForm({
  email: "",
  password: "",
});

defineProps({
  flash: Object,
  errors: Object,
});

function submit() {
  form.post("/login");
}

</script>

<template>
  <AppHeader title="Login"/>
  <h1 class="mb-4">Login</h1>
  <div v-if="flash.error" class="text-danger">
    {{ flash.error }}
  </div>
  <form @submit.prevent="submit">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" v-model="form.email" class="form-control" id="email">
      <div v-if="errors.email" class="text-danger form-text">{{ errors.email }}</div>

    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Senha</label>
      <input type="password" v-model="form.password" class="form-control" id="password">
      <div v-if="errors.password" class="text-danger form-text">{{ errors.password }}</div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</template>

<style scoped>

</style>
