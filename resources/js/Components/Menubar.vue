<!-- resources/js/Components/Menubar.vue -->
<template>
  <nav class="bg-blue-300 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <div class="logo">
        <img src="/resources/assets/logo.png" alt="Logo" class="h-8">
        <span class="text-lg font-bold">SuperCarService Teszt Feladat</span>
      </div>
      <ul class="flex space-x-4">
        <li><a href="/" class="hover:underline">Menu1</a></li>
        <li><a href="/" class="hover:underline">Menu2</a></li>
        <li><a href="/" class="hover:underline">Menu3</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Menubar',
};
</script>

<style scoped>
</style>