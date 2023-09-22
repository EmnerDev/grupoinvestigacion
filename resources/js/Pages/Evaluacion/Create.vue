<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Evaluacion para la Categorización del Grupo de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-700">
                <div>
                    <div>
                        <InputLabel>Grupo: </InputLabel>
                        <span>{{ intePerson }}</span>
                    </div>
                    <div>
                     <InputLabel>Integrante: </InputLabel>
                     <span></span>
                    </div>
                </div>
                <form @submit.prevent="submit">
                    <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div>
                            <table class="w-full">
                                    <thead>                                        
                                        <tr>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">N°</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Criterio</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Indicador</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Cantidad</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Puntaje Indicador</th>
                                            <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Puntaje Criterio</th>
                                            <!-- <th class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Accion</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="cri,j  in criterios" :key="cri.id">
                                            <tr  v-for=" indi, i in cri.indicador" :key="indi.id">
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.indicador.length">
                                                    {{ j+1 }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.indicador.length">
                                                    {{ cri.name }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    {{ indi.name }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <TextInput v-model="indi.cantidad" @input="calcularTotal(indi, j, i)"></TextInput>
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <InputLabel v-model="indi.puntaje" >{{ calcularTotalIndicador(indi) }}</InputLabel>
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.indicador.length"
                                                    >
                                                    <InputLabel v-model="cri.puntaje">{{ calcularTotalCriterio(j) }}</InputLabel>
                                                </td>
                                                <!-- <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.indicador.length">
                                                <PrimaryButton class="pl-7">
                                                    <i class="fa-solid fa-plus-circle"></i>Guardar
                                                </PrimaryButton>
                                                <DangerButton><i class="fa-solid fa-trash"></i>Cancelar</DangerButton>
                                                </td> -->
                                            </tr>
                                        </template>
                                </tbody>
                            </table>
                                <h1 class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-lg text-center font-bold	" >Puntaje Total: <InputLabel>{{ calcularTotalGeneral() }}</InputLabel></h1>
                                <div class="flex justify-center">
                                    <div class="p-3 mt-6">
                                        <PrimaryButton class="pl-7">
                                            <i class="fa-solid fa-plus-circle"></i>Guardar
                                        </PrimaryButton>
                                    </div>
                                    <div class="p-3 mt-6">
                                        <DangerButton><i class="fa-solid fa-trash"></i>Cancelar</DangerButton>
                                    </div>
                                </div>
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
    evaluaciones: Array,
    criterios: Object,
    indicadores: Object,
    integrantes: Object,
    grupos: Object,

});


console.log('evaluaciones', props.evaluaciones);
// console.log('criterios', props.criterios);
// console.log('indicadores', props.indicadores);
const cantidades = ref([]);
const puntajeCriterio = ref(props.criterios);
const totalGeneral = ref(0);
const intePerson = ref([]);
const gruposIntegra = ref([]);

const form = useForm({
    cantidad:'',
    puntaje:'',
    id_criterio:'',
    id_indicador:'',
    id_integrante:'',
    id_grupo:'',
    ptj_por_indicador:''
})

// const  addItem = (item) => {
//     cantidades.value.push({
//         id: item.id,
//         cantidad: '',
//         ptj_por_indicador:item.ptj_por_indicador,
//         puntaje:0,
//         criterio: item.id_criterio
//     });
//     console.log('probando', cantidades.value);
// }


const calcularTotal = (indi, j , i) => {
    const cantidad = parseFloat(indi.cantidad);
    if(isNaN(cantidad)){

        indi.puntaje = cantidad * parseFloat(indi.ptj_por_indicador);
        //indi.puntaje = parseFloat(indi.cantidad)* parseFloat(indi.ptj_por_indicador);

        const criterio = props.criterios[j];
        criterio.puntaje = calcularTotalCriterio(j);

        calcularTotalGeneral();
    }else{
        indi.puntaje = 0;

        const criterio = props.criterios[j];
        criterio.puntaje = calcularTotalCriterio(j);

        calcularTotalGeneral();
    }
};

const calcularTotalIndicador = (indi) => {
    return parseFloat(indi.cantidad)*parseFloat(indi.ptj_por_indicador);
};


const calcularTotalCriterio = (j) => {
    //console.log('llegando', j);
    const criterio = props.criterios[j];
    //console.log('prueba', criterio);
    let total = 0;
    for(const indi of criterio.indicador){
        //console.log('datos indi', indi);
        total += calcularTotalIndicador(indi);
        console.log('suma', total)
    }
    console.log('suma fuera del for', total)
    return total;
};

const calcularTotalGeneral = () => {
    let total = 0
    for(const criterio of puntajeCriterio.value){
        total +=  criterio.puntaje;
    }
    return totalGeneral.value = total;
    
};

onMounted(() =>{
    calcularTotalGeneral();
    intePerson.value = props.integrantes;
    gruposIntegra.value = props.grupos;
});
// const calcularTotalCriterioPrueba = computed( () => { 
//     return (j) =>{
//         const criterio = props.criterios[j];
//     //console.log('prueba', criterio);
//     let total = 0;
//     for(const indi of criterio.indicador){
//         //console.log('datos indi', indi);
//         total += calcularTotalIndicador(indi);
//         console.log('suma', total)
//     }
//     console.log('suma fuera del for', total)
//     return total;
//     }
// });
</script>
