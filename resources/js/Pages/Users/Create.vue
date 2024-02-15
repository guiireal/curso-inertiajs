<script setup>
import { reactive, ref } from "vue";
import { router } from "@inertiajs/vue3";

const user = reactive({
  name: "",
  email: "",
  password: "",
});

let isLoading = ref(false);

defineProps({
  errors: Object,
});

function submit() {
  router.post("/users", user, {
    onStart() {
      isLoading.value = true;
    },
    onFinish() {
      isLoading.value = false;
    },
  });
}
</script>

<template>
  <AppHeader title="Novo usuário"/>
  <div class="card">
    <div class="card-header">
      <div class="card-title"><h1>Novo usuário</h1></div>
      <div class="card-body">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" type="text" class="form-control" v-model="user.name">
            <div v-if="errors.name" class="text-danger form-text">{{ errors.name }}</div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" class="form-control" v-model="user.email">
            <div v-if="errors.email" class="text-danger form-text">{{ errors.email }}</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control" v-model="user.password">
            <div v-if="errors.password" class="text-danger form-text">
              {{ errors.password }}
            </div>
          </div>
          <button type="submit" class="btn btn-primary" :disabled="isLoading">
            <span v-if="isLoading">Enviando...</span>
            <span v-else>Enviar</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
