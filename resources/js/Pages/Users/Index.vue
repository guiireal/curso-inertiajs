<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import Paginator from "../../Components/Paginator.vue";
import { debounce } from "lodash";

const props = defineProps({
  users: Object,
  search: String
});

const search = ref(props.search);
const page = usePage();

watch(search, debounce((value) => {
  router.get("/users", { search: value }, {
    preserveState: true,
    replace: true
  });
}, 500));

const message = computed(() => page.props.flash.success);

</script>

<template>
  <AppHeader title="Usuários"/>
  <h1>Usuários</h1>
  <div class="my-4">
    <input type="text" placeholder="Pesquisar..." class="form-control" v-model="search"/>
  </div>
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
  <Paginator :data="users"/>
</template>
