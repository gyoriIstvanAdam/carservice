<template>
    <div class="pagination-container" v-if="data.total > 0">
      <nav>
        <ul class="pagination">
          <li v-if="data.first_page_url && data.current_page !== 1">
            <button @click="openLink(data.first_page_url, 1)">
              <ChevronsLeftIcon class="icon"/>
            </button>
          </li>
          <li v-if="data.prev_page_url && data.current_page !== 1">
            <button @click="openLink(data.prev_page_url, data.current_page - 1)">
              <ChevronLeftIcon class="icon"/>
            </button>
          </li>
          <li v-for="link in filtered_links" :class="{ active: link.active }">
            <button v-if="link.url" @click="openLink(link.url, parseInt(link.label))">
              {{ link.label }}
            </button>
            <span v-else>{{ link.label }}</span>
          </li>
          <li v-if="data.next_page_url && data.current_page !== data.last_page">
            <button @click="openLink(data.next_page_url, data.current_page + 1)">
              <ChevronRightIcon class="icon"/>
            </button>
          </li>
          <li v-if="data.last_page && data.current_page !== data.last_page">
            <button @click="openLink(data.last_page_url, data.last_page)">
              <ChevronsRightIcon class="icon"/>
            </button>
          </li>
        </ul>
      </nav>
    </div>
    <div v-else>
      {{ $t('main.nincsenek_tetelek') }}
    </div>
  </template>

  <script>
  export default {
    name: "paginator",
    props: {
      data: Object
    },
    emits: ['refreshdata', 'refreshpage'],
    data() {
      return {
        per_page: this.data.per_page,
      }
    },
    computed: {
      filtered_links() {
        return this.data.links.slice(1, -1);
      }
    },
    methods: {
      changePerPage() {
        this.$emit('refreshdata', this.per_page);
      },
      openLink(url, page) {
        localStorage.setItem(this.$parent.$options.name + 'page', page);
        this.$emit('refreshpage', page);
        this.$inertia.get(url, {}, { preserveState: true, preserveScroll: true, replace: true });
      }
    }
  }
  </script>

  <style scoped>
  </style>