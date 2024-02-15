<script setup>

</script>

<template>
  <AppHeader title="Home"/>
  <div>
    <h1 v-if="$page.props?.auth?.user">Bem vindo, {{ $page.props.auth.user.name }}</h1>
    <h1 v-else>Home</h1>
  </div>
</template>
