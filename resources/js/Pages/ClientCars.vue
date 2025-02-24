<template>
                   <div v-if="client">
                     <button @click="$emit('back')" class="btn btn-secondary bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Back</button>
                     <h2 class="text-xl font-bold mt-4">{{ client.name }} gépjárművei:</h2>
                     <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                       <thead>
                         <tr class="bg-gray-100">
                           <th class="py-2 px-4 border-b">Autó sorszáma</th>
                           <th class="py-2 px-4 border-b">Autó típusa</th>
                           <th class="py-2 px-4 border-b">Regisztrálás időpontja</th>
                           <th class="py-2 px-4 border-b">Saját márkás-e</th>
                           <th class="py-2 px-4 border-b">Balesetek száma</th>
                           <th class="py-2 px-4 border-b">Legutolsó szerviz esemény neve</th>
                           <th class="py-2 px-4 border-b">Legutolsó szerviz esemény időpontja</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr v-for="(car, carKey) in cars" :key="carKey" @click="selectCar(car.car_id)">
                           <td class="py-2 px-4 border-b text-center">{{ car.car_id }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.type }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.registration_date }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.is_own_brand ? 'Igen' : 'Nem' }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.accident_count }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.service_log }}</td>
                           <td class="py-2 px-4 border-b text-center">{{ car.service_log_date }}</td>
                         </tr>
                       </tbody>
                     </table>
                     <ServiceLog v-if="selectedCarId" :carId="selectedCarId" />
                   </div>
                 </template>

                 <script>
                 import axios from "axios";
                 import ServiceLog from './ServiceLog.vue';

                 export default {
                   props: ['client'],
                   data() {
                     return {
                       cars: [],
                       selectedCarId: null,
                     };
                   },
                   watch: {
                     client: 'fetchClientCars'
                   },
                   methods: {
                     fetchClientCars() {
                       if (this.client) {
                         axios.get(`/${this.client.id}/cars`).then(response => {
                           this.cars = response.data;
                         });
                       }
                     },
                     selectCar(carId) {
                       this.selectedCarId = this.selectedCarId === carId ? null : carId;
                     }
                   },
                   mounted() {
                     this.fetchClientCars();
                   },
                   components: {
                     ServiceLog
                   }
                 };
                 </script>

                 <style scoped>
                 </style>