<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  data: Object,
});
</script>

<template>
  <ul class="pagination">
    <li class="page-item" v-for="link in data.links">
      <template v-if="link.url">
        <Link class="page-link" :href="link.url" v-html="link.label" :class="{ active: link.active }"/>
      </template>
    </li>
  </ul>
</template>

<style scoped>

</style>
