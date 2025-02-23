<template>
  <div class="w-1/4 h-screen border-r border-gray-200 bg-blue-500">
    <nav class="p-4">
      <ul>
        <li>
          <a href="#" class="menu-item cursor-not-allowed">
            <FilePenLine class="icon-class" /> Menu 1
          </a>
        </li>
        <li>
          <a href="#" class="menu-item cursor-not-allowed">
            <FilePenLine class="icon-class" /> Menu 2
          </a>
        </li>
        <li>
          <a href="#" class="menu-item cursor-not-allowed">
            <FilePenLine class="icon-class" /> Menu 3
          </a>
        </li>
        <li>
          <a href="#" class="menu-item cursor-not-allowed">
            <FilePenLine class="icon-class" /> Menu 4
          </a>
        </li>
        <li>
          <a href="#" class="menu-item cursor-not-allowed">
            <FilePenLine class="icon-class" /> Menu 5
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { FilePenLine } from 'lucide-vue-next';

export default {
  name: 'MenuComponent',
  components: {
    FilePenLine
  }
};
</script>

<style scoped>
.icon-class {
  width: 1em;
  height: 1em;
  margin-right: 0.5em;
}
</style>