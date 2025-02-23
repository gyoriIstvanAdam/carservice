<template>
    <div v-if="carId">
      <h3 class="text-xl font-bold mt-4">Szervízkönyv a {{ carId }} sorszámú járműhöz</h3>
      <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b">Alkalom sorszáma</th>
            <th class="py-2 px-4 border-b">Esemény neve</th>
            <th class="py-2 px-4 border-b">Esemény időpontja</th>
            <th class="py-2 px-4 border-b">Munkalap azonosító</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(log, logKey) in serviceLogs" :key="logKey">
            <td class="py-2 px-4 border-b text-center">{{ log.log_number }}</td>
            <td class="py-2 px-4 border-b text-center">{{ log.event }}</td>
            <td class="py-2 px-4 border-b text-center">{{ log.event_time }}</td>
            <td class="py-2 px-4 border-b text-center">{{ log.document_id }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    props: ['carId'],
    data() {
      return {
        serviceLogs: [],
      };
    },
    watch: {
      carId: 'fetchServiceLogs'
    },
    methods: {
      fetchServiceLogs() {
        if (this.carId) {
          axios.get(`${this.carId}/services`)
            .then(response => {
              console.log(response.data);
              this.serviceLogs = response.data;
            })
            .catch(error => {
              console.error("Error fetching service logs:", error);
            });
        }
      }
    },
    mounted() {
      this.fetchServiceLogs();
    }
  };
  </script>

  <style scoped>
  </style>