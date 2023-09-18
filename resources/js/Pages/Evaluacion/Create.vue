<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Evaluacion para la Categorización del Grupo de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-700">
                <form @submit.prevent="submit">
                    <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div>
                            <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th
                                            class="w-full border-b-2 border-blue-200 bg-blue-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            :colspan="7"
                                            >Rubro I: Produccion Cientìfica, tecnològica y/o industrial orientada a la linea de investigacion</th>
                                        </tr>
                                        <tr>
                                            <!-- <th
                                                class="border-b-2 border-blue-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            N°
                                            </th> -->
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Criterio
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Indicador
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Cantidad
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Puntaje individual
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Puntaje Total
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Accion
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="cri,j  in criterios">
                                            <tr  v-for=" indi, i in cri.indicador" :key="indi.id">
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    {{ j+1 }}
                                                    </p>
                                                </td>
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    {{ cri.name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    {{ indi.name }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    <TextInput v-model="newItem" @blur="addItem(indi)"></TextInput>
                                                    </p>
                                                </td>
                                                <td
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >

                                                    </p>
                                                </td>
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >

                                                    </p>
                                                </td>
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm">
                                                <LinkPrimaryButton class="pl-7">
                                                    <i class="fa-solid fa-plus-circle"></i>Guardar
                                                </LinkPrimaryButton>
                                                <DangerButton><i class="fa-solid fa-trash"></i>Cancelar</DangerButton>
                                            </td>
                                            </tr>
                                        </template>

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import LinkPrimaryButton from "@/Components/LinkPrimaryButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from '@/Components/Pagination.vue'
import SelectInput from "@/Components/SelectInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import '@fortawesome/fontawesome-free/css/all.css';
import { nextTick, ref } from "vue";
import { watch, reactive } from "vue";
import Paginator from "@/Components/Paginator.vue";
import { computed } from 'vue';
import { onMounted } from 'vue';
import { onBeforeMount } from 'vue';



const props = defineProps({
    criterios: Object,
});
const indicadores = ref([]);
const criData = ref(props.criterios || []);
const cantidades = ref([]);
onBeforeMount(() => {
  criData.value = props.criterios || [];
});
//console.log('probando', criterios);

const addItem = (item) => {
    if(indicadores.value.length > 0){
        indicadores.value.forEach(element => {
            let data = indicadores.value.find(ele => ele.id === item.id);
            if(!data)
            {
                indicadores.value.push(item,1)
            }
        })
        console.log('indicadores', indicadores.value);
    } else {
        indicadores.value.push(item,1);
        console.log('probando', item);
        console.log('indicadores', indicadores.value);
    }


}

const CalcularCantidadTotalPorIndicador = (criterioIndex) => {
    if(!cantidades.value[criterioIndex]) return 0;
        const cantidadesPorIndex = cantidades.value[criterioIndex];
        return cantidadesPorIndex.reduce((acc, cantidad) => acc + Number(cantidad), 0);

};

const inicializarCantidades = () => {
    cantidades.value = criData.value.map((criterio) => criterio.indicador.map(() => 0));
}

const cantidaadTotalPorIndicador = computed(() => {
    const totals = [];
    for(let i = 0; i < cantidades.value[0].length;i++){
        let total = 0;
        for(let j = 0; j < cantidades.value.length; j++){
            total += Number(cantidades.value[j][i]);
        }
        totals.push(total);
    }
    return totals;
});



onMounted( async() => {
    inicializarCantidades();
});



// return{

//     cantidades,
//     CalcularCantidadTotalPorIndicador,
//     inicializarCantidades,
//     cantidaadTotalPorIndicador,
// };
</script>
