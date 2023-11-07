<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
           Reporte de Total de Grupos de Investigación 
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form>
                        <div class="overflow-x-auto rounded-lg shadow mt-6">
                            <div class="mb-4">
                                <div class="flex justify-between ">                                     
                                    <div class="mb-2 flex ">
                                        <input
                                                type="text"
                                                v-model="search"
                                                placeholder="Buscar..."   
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
                                            />                                        
                                    </div>
                                    <div class="flex mb-6">
                                        <LinkEvaluarButton :href="route('grupos.reporte')" target="_blanck" class="">
                                            <i class="fa-solid fa-file-pdf" style="font-size: 20px;"></i>
                                            Descargar PDF
                                        </LinkEvaluarButton>
                                    </div>                            

                                </div>
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                N°
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Area de Investigacion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Linea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Sublinea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Nombre del grupo
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Categoria del grupo
                                            </th>                                            
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Integrantes
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                                Condicion
                                            </th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(gru, i) in grupos.data"
                                            :key="gru.id" :value="gru.id">
                                        <tr                                           
                                            
                                        >
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ i + 1 }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.area_investigacion.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.linea.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.sublinea.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                            :rowspan="gru.integrante.length+1"
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.name }}
                                                </p>
                                            </td>
                                            <td v-if="gru.integrante && gru.integrante.length"
                                                :rowspan="gru.integrante.length+1"
                                                class=" border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p v-for="cat in gru.evaluacion_grupos" :key="cat.id"
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ cat.categorias }}
                                                </p>
                                            </td>                                          
                                        </tr>
                                        <tr v-for="integ in gru.integrante" :key="integ.id">
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p
                                                
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ integ.persona.name }} {{ integ.persona.first_name }} {{ integ.persona.last_name }}
                                                </p>
                                            </td>
                                            <td 
                                                class=" border-b border-gray-200 bg-white px-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ integ.condition }}
                                                </p>
                                            </td>                                                                                        
                                        </tr>
                                        </template>
                                    </tbody>
                                </table>
                                <div
                                    class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                                >
                                    <paginator class="mt-3" :paginator="grupos" />
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import LinkWarningButton from "@/Components/LinkWarningButton.vue";
import LinkPrimaryButton from "@/Components/LinkPrimaryButton.vue";
import LinkEvaluarButton from "@/Components/LinkEvaluarButton.vue";
import LinkButton from "@/Components/LinkButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "@/Components/Pagination.vue";
import SelectInput from "@/Components/SelectInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref } from "vue";
import { watch } from "vue";
import Paginator from "@/Components/Paginator.vue";
import axios from "axios";

const props = defineProps({
    grupos: {
        type: Object,
    },
    // integrantes: {
    //     type: Object,
    // },
    filters: {
        type: Object,
        default: () => ({}),
    },
    editMode: false,
});

const form = useForm({});

let search = ref(props.filters.search);
watch(search, (value) => {
    router.get(
        "/reporte",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

const submit = () =>{
    axios.post(route('grupos.reporte'))
    .then(response => {
        console.log('correcto', response);
        const blob = new Blob([response.data], {type: 'application/pdf'});
        const url = window.URL.createObjectURL(blob);

        const a = document.getElement('a');
        a.href = url;
        a.download = 'report.pdf';
        a.style.display = 'none';
        document.body.appendChild(a);

        a.click();

        window.URL.revokeObjectURL(url);
    })
    .catch(error => {

    });
}

</script>
