<template>
                  <MainLayout>
                    <div class="container mx-auto p-4">
                      <ClientList v-if="!selectedClient" :data="data" :filters="filters" @select-client="selectClient" />
                      <ClientCars v-else :client="selectedClient" @back="selectedClient = null" />
                    </div>
                  </MainLayout>
                </template>

                <script>
                import MainLayout from '../Layouts/MainLayout.vue';
                import Paginator from '../Global-components/paginator/paginator.vue';
                import ClientList from './ClientList.vue';
                import ClientCars from './ClientCars.vue';

                export default {
                  name: 'Home',
                  components: {
                    MainLayout,
                    Paginator,
                    ClientList,
                    ClientCars,
                  },
                  props: ['data', 'filters'],
                  data() {
                    return {
                      selectedClient: null,
                    };
                  },
                  computed: {
                    linkdata() {
                      let linkes = { ...this.data };
                      delete linkes.data;
                      return linkes;
                    },
                  },
                  methods: {
                    refreshData(e) {
                      this.query.per_page = e;
                      this.getData();
                    },
                    selectClient(client) {
                      this.selectedClient = client;
                    }
                  },
                };
                </script>

                <style scoped>
                </style>