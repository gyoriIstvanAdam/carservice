<template>
  <!-- BEGIN: Pagination -->
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center" v-if="data.total>0">
    <nav class="w-full sm:w-auto sm:mr-auto">
      <ul class="pagination">
        <li class="page-item" v-if="data.current_page!==1">
          <div class="page-link" @click="changePage(1)">
            <ChevronsLeftIcon class="w-4 h-4"/>
          </div>
        </li>
        <li class="page-item" v-if="data.current_page!==1">
          <div class="page-link" @click="changePagePrev">
            <ChevronLeftIcon class="w-4 h-4"/>
          </div>
        </li>
        <li class="page-item" v-for="link in filtered_links" :class="{'active': link.active}">
          <div v-if="!link.active" class="page-link" @click="changePage(link.label)">{{ link.label }}</div>
          <span v-else class="page-link">{{ link.label }}</span>
        </li>
        <li class="page-item" v-if="data.current_page!==data.last_page">
          <div class="page-link" @click="changePageNext">
            <ChevronRightIcon class="w-4 h-4"/>
          </div>
        </li>
        <li class="page-item" v-if="data.current_page!==data.last_page">
          <div class="page-link" @click="changePage(data.last_page)">
            <ChevronsRightIcon class="w-4 h-4"/>
          </div>
        </li>
      </ul>
    </nav>
    <select class="w-20 form-select box mt-3 sm:mt-0" v-model="params.per_page" @change="changePerPage">
      <option>15</option>
      <option>30</option>
      <option>50</option>
      <option>100</option>
    </select>
  </div>
  <!-- END: Pagination -->
  <div class="col-span-12 hidden whitespace-no-wrap md:block mx-auto text-slate-500 text-center" v-if="data.total>0">
    Tételek {{ from }}-{{ to }}-ig a {{ total }}-ből
  </div>
  <div class="col-span-12 hidden whitespace-no-wrap md:block mx-auto text-slate-500 text-center" v-else>
    {{ $t('main.nincsenek_tetelek') }}
  </div>

</template>

<script>
export default {
  name: "paginator_alter",
  props: {
    data: Object,
  },
  emits: ['refreshdata'],
  data() {
    return {
      params: {
        per_page: this.data.per_page,
        page: this.data.current_page ? this.data.current_page : 1,
      },
    }
  },
  computed: {
    filtered_links: function () {
      return this.data.links.slice(1, -1);
    },
    total: function () {
      return this.data.total;
    },
    from: function () {
      return this.data.from;
    },
    to: function () {
      return this.data.to;
    },
  },
  watch: {
    'params.page'(newValue) {
      this.$emit('refreshdata', this.params);
    },
    'data.per_page'(newValue) {
      this.params.per_page = newValue;
    },
  },
  methods: {
    changePerPage() {
      this.$emit('refreshdata', this.params);
    },
    changePage(page) {
      this.params.page = Number(page);
      this.$emit('refreshdata', this.params);
    },
    changePageNext() {
      this.params.page++;
    },
    changePagePrev() {
      this.params.page--;
    },
  }
}
</script>

<style scoped>

</style>
