<template>
                  <MainLayout>
                    <div class="container mx-auto p-4">
                      <h1 class="text-2xl font-bold mb-4 text-center">Search Results</h1>
                      <button @click="goBack" class="btn btn-secondary bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 mb-4">Vissza</button>
                      <div v-if="error" class="text-red-500 mb-4">{{ error }}</div>
                      <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                          <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b">Ügyfél azonosító</th>
                            <th class="py-2 px-4 border-b">Név</th>
                            <th class="py-2 px-4 border-b">Okmányazonosító</th>
                            <th class="py-2 px-4 border-b">Jármű darabszám</th>
                            <th class="py-2 px-4 border-b">Összes szervíz napló</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(client, index) in data.data" :key="index" class="intro-x">
                            <td class="py-2 px-4 border-b text-center">{{ client.id }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ client.name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ client.card_number }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ client.car_count }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ client.service_count }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <Paginator :data="linkdata" @refreshdata="refreshData"/>
                    </div>
                  </MainLayout>
                </template>

                <script>
                import MainLayout from '../Layouts/MainLayout.vue';
                import Paginator from '../Global-components/paginator/paginator.vue';

                export default {
                  name: 'ListSearchResult',
                  components: {
                    MainLayout,
                    Paginator,
                  },
                  props: ['data', 'filters', 'error'],
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
                    goBack: function () {
                      this.$inertia.get(route('ListClients'));
                    },
                  },
                };
                </script>

                <style scoped>
                </style>