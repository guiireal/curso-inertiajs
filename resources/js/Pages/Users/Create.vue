<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
});

function submit() {
  form.post("/users", {
    onFinish() {
      form.reset();
      setTimeout(() => {
        form.clearErrors();
      }, 4000);
    },
    preserveScroll: true,
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
            <input id="name" type="text" class="form-control" v-model="form.name">
            <div v-if="form.errors.name" class="text-danger form-text">{{ form.errors.name }}</div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" class="form-control" v-model="form.email">
            <div v-if="form.errors.email" class="text-danger form-text">{{ form.errors.email }}</div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" class="form-control" v-model="form.password">
            <div v-if="form.errors.password" class="text-danger form-text">
              {{ form.errors.password }}
            </div>
          </div>
          <button type="submit" class="btn btn-primary" :disabled="form.processing">
            <span v-if="form.processing">Enviando...</span>
            <span v-else>Enviar</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
