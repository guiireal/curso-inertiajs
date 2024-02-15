<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const auth = computed(() => page.props.auth);

</script>

<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <Link class="nav-link active" aria-current="page" href="/">Home</Link>
          </li>
          <template v-if="auth">
            <li class="nav-item">
              <Link class="nav-link" href="/users">Usuários</Link>
            </li>
            <li class="nav-item">
              <Link class="nav-link" href="/users/create">Novo usuário</Link>
            </li>
          </template>
        </ul>
        <div>
          <template v-if="auth">
            <Link href="/logout" as="button" method="delete" class="btn btn-danger">Logout</Link>
          </template>
          <template v-else>
            <Link href="/login" as="button" class="btn btn-primary">Login</Link>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>

</style>
