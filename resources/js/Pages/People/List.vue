<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header> Lista de Personas Registradas </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                
                        <div class="flex justify-center">
                            <button
                                @click="setActiveTab('tab1')"
                                :class="{
                                    'bg-blue-500': activeTab === 'tab1',
                                    'text-white': activeTab === 'tab1',
                                    'bg-gray-300': activeTab !== 'tab1',
                                    'text-gray-700': activeTab !== 'tab1',
                                }"
                                class="py-2 px-4 border border-gray-300 rounded-l cursor-pointer"
                            >
                                Docentes Nombrados
                            </button>
                            <button
                                @click="setActiveTab('tab2')"
                                :class="{
                                    'bg-blue-500': activeTab === 'tab2',
                                    'text-white': activeTab === 'tab2',
                                    'bg-gray-300': activeTab !== 'tab2',
                                    'text-gray-700': activeTab !== 'tab2',
                                }"
                                class="py-2 px-4 border border-gray-300 rounded-r cursor-pointer"
                            >
                                Docentes Contratados
                            </button>
                        </div>

                        <div class="p-4 mt-4 bg-white rounded-md">
                            <div v-show="activeTab === 'tab1'">
                                <!-- Contenido de la pestaña 1 -->
                                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                    <table class="w-full whitespace-no-wrap">
                                        <thead>
                                            <tr
                                                class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"
                                            >
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    N°
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Dni
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Nombre
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Apellidos
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Condicion
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Telefono
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Email
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="persona, i in personas.data" :key="persona.id">
                                                <!-- <template v-for=" person in user.persona" :key="person.id"> -->
                                                    <tr                                                        
                                                        class="text-gray-700"
                                                    >
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ i+1 }}
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.dni }}
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.name }}
                                                            </p>
                                                        </td>
                                                        <td 
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.first_name }} {{ persona.last_name }}
                                                            </p>
                                                        </td> 
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.tipo.name }}
                                                            </p>
                                                        </td> 
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.phone }}
                                                            </p>
                                                        </td>                                                         
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.email }}
                                                            </p>
                                                        </td> 
                                                    </tr>
                                                <!-- </template> -->
                                            </template>
                                        </tbody>
                                    </table>

                                    <div
                                        class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                                    >
                                        <pagination :links="personas.links" />
                                    </div>
                                </div>
                            </div>

                            <div v-show="activeTab === 'tab2'">
                                <!-- Contenido de la pestaña 2 -->
                                <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                    <table class="w-full whitespace-no-wrap">
                                        <thead>
                                            <tr
                                                class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"
                                            >
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    N°
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Dni
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Nombre
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Apellidos
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Condicion
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Telefono
                                                </th>
                                                <th
                                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                                >
                                                    Email
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="persona, i in contratados.data" :key="persona.id">
                                                <!-- <template v-for=" person in user.persona" :key="person.id"> -->
                                                    <tr                                                        
                                                        class="text-gray-700"
                                                    >
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ i+1 }}
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.dni }}
                                                            </p>
                                                        </td>
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.name }}
                                                            </p>
                                                        </td>
                                                        <td 
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.first_name }} {{ persona.last_name }}
                                                            </p>
                                                        </td> 
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.tipo.name }}
                                                            </p>
                                                        </td> 
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.phone }}
                                                            </p>
                                                        </td>                                                         
                                                        <td
                                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                                        >
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ persona.email }}
                                                            </p>
                                                        </td> 
                                                    </tr>
                                                <!-- </template> -->
                                            </template>
                                        </tbody>
                                    </table>

                                    <div
                                        class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                                    >
                                        <pagination :links="contratados.links" />
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import DataTable from "datatables.net-dt";
import { ref } from "vue";
import "datatables.net-dt/css/jquery.dataTables.css";
import Pagination from '@/Components/Pagination.vue'

const activeTab = ref("tab1");

const props = defineProps({
    personas:Object,
    contratados: Object
});
console.log('personas', props.personas);

const setActiveTab = (tab) => {
    activeTab.value = tab;
};
</script>
