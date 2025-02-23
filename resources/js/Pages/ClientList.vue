<template>
              <div>
                <h1 class="text-2xl font-bold mb-4 text-center">Kliens Lista</h1>
                <div class="w-56 relative text-slate-500">
                  <input v-model="query.clientName" id="clientName" type="text" class="form-control w-56 box pr-10 border border-gray-300 rounded-md" placeholder="Ügyfél neve..."/>
                </div>
                <div class="w-56 relative text-slate-500 mt-4">
                  <input v-model="query.clientCardNumber" id="clientCardNumber" type="text" class="form-control w-56 box pr-10 border border-gray-300 rounded-md" placeholder="Ügyfél okmányazonosítója..." @input="validateClientCardNumber"/>
                </div>
                <div class="mt-4">
                  <button @click="searchClients" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Keresés</button>
                </div>
                <div v-if="error" class="text-red-500 mt-2">{{ error }}</div>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mt-4">
                  <thead>
                    <tr class="bg-gray-100">
                      <th class="py-2 px-4 border-b">Ügyfél azonosító</th>
                      <th class="py-2 px-4 border-b">Név</th>
                      <th class="py-2 px-4 border-b">Okmányazonosító</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(datas, datakey) in data.data" :key="datakey" class="intro-x" @click="selectClient(datas)">
                      <td class="py-2 px-4 border-b text-center">{{ datas.id }}</td>
                      <td class="py-2 px-4 border-b text-center">{{ datas.name }}</td>
                      <td class="py-2 px-4 border-b text-center">{{ datas.card_number }}</td>
                    </tr>
                  </tbody>
                </table>
                <Paginator :data="linkdata" @refreshdata="refreshData"/>
              </div>
            </template>

            <script>
            import { debounce } from 'lodash';
            import Paginator from '../Global-components/paginator/paginator.vue';

            export default {
              name: 'ClientList',
              components: {
                Paginator,
              },
              props: ['data', 'filters'],
              data() {
                return {
                  query: {
                    per_page: 15,
                    clientName: '',
                    clientCardNumber: '',
                  },
                  error: '',
                };
              },
              watch: {
                'query.clientName': function(newValue) {
                  this.debouncedWatch();
                },
                'query.clientCardNumber': function(newValue) {
                  this.debouncedWatch();
                },
              },
              created() {
                this.debouncedWatch = debounce(() => {
                  this.getData();
                }, 500);
              },
              beforeUnmount() {
                if (this.debouncedWatch) {
                  this.debouncedWatch.cancel();
                }
              },
              computed: {
                linkdata() {
                  let linkes = { ...this.data };
                  delete linkes.data;
                  return linkes;
                },
              },
              methods: {
                getData() {
                  this.$inertia.get(route(this.url), this.query, { preserveState: true, replace: true });
                },
                refreshData(e) {
                  this.query.per_page = e;
                  this.getData();
                },
                selectClient(client) {
                  this.$emit('select-client', client);
                },
                searchClients() {
                  if (this.query.clientName && this.query.clientCardNumber) {
                    this.error = 'Csak az egyiket tölsd ki!';
                  } else if (!this.query.clientName && !this.query.clientCardNumber) {
                    this.error = 'Töltsd ki az egyik mezőt!';
                  } else if (this.error) {
                    return;
                  } else {
                    this.error = '';
                    this.$inertia.get(route('clients.search'), this.query);
                  }
                },
                validateClientCardNumber() {
                  const regex = /^[a-zA-Z0-9]*$/;
                  if (!regex.test(this.query.clientCardNumber)) {
                    this.error = 'Csak betűk és számok írhatóak be az okmányazonosító mezőbe!';
                  } else {
                    this.error = '';
                  }
                },
              },
            };
            </script>

            <style scoped>
            </style>