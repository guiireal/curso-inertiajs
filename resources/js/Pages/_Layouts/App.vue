<script setup>
import NavBar from "../../Components/NavBar.vue";
</script>

<template>
  <main>
    <header>
      <NavBar/>
    </header>
    <article>
      <div class="container">
        <slot/>
      </div>
    </article>
  </main>
</template>
