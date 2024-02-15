<script setup>
import NavBar from "../../Components/NavBar.vue";
</script>

<template>
  <header>
    <NavBar/>
  </header>
  <main class="mt-5">
    <div class="container">
      <slot/>
    </div>
  </main>
</template>
