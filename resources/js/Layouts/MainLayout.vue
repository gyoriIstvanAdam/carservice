<!-- resources/js/Layouts/MainLayout.vue -->
<template>
  <div>
    <Menubar />
      <slot></slot>
  </div>
</template>

<script>
import Menubar from '../Components/Menubar.vue';

export default {
  name: 'MainLayout',
  components: {
    Menubar,
  },
};
</script>

<style scoped>
</style>