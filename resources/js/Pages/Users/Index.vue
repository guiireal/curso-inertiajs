<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

defineProps({
  users: Object,
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

  <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between" v-for="user in users.data" :key="user.id">
      {{ user.name }}
      <Link :href="`/users/${user.id}`" :data="{ teste: 'ok' }" method="delete" as="button" class="btn btn-danger">
        Deletar
      </Link>
    </li>
  </ul>
  <hr>
  <ul class="pagination">
    <li class="page-item" v-for="link in users.links">
      <Link class="page-link" :href="link.url" v-html="link.label" :class="{ active: link.active }" preserve-scroll/>
    </li>
  </ul>
</template>
