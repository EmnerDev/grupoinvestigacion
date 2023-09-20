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
                                            <th
                                                class="border-b-2 border-blue-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            N°
                                            </th>
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
                                            Puntaje Indicador
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                            >
                                            Puntaje Criterio
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
                                                    <!-- <TextInput v-model="newItem" @blur="addItem(indi)"></TextInput> -->
                                                    <TextInput v-model="indi.cantidad" @input="calcularTotal(indi)"></TextInput>
                                                    </p>
                                                </td>
                                                <td 
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    <InputLabel v-model="indi.puntaje" >{{ calcularTotalIndicador(indi) }}</InputLabel>
                                                    </p>
                                                </td>
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <p
                                                        class="text-gray-900 whitespace-no-wrap"
                                                    >
                                                    <InputLabel v-model="cri.puntaje">{{ calcularTotalCriterio(cri) }}</InputLabel>
                                                    </p>
                                                </td>
                                                <td v-if="i===0" :rowspan="cri.indicador.length"
                                                    class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm">
                                                <PrimaryButton class="pl-7">
                                                    <i class="fa-solid fa-plus-circle"></i>Guardar
                                                </PrimaryButton>
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
    evaluaciones: Object,
    criterios: Object,
    
});
const indicadores = ref([]);
const cantidades = ref([]);
const newItem = ref('');
const puntajeCriterio = ref([]);

const form = useForm({
    cantidad:'',
    puntaje:'',
    id_criterio:'',
    id_indicador:'',
    id_integrante:'',
    id_grupo:'',
    ptj_por_indicador:''
})
const  addItem = (item) => {
    cantidades.value.push({
        id: item.id,
        cantidad: '',
        ptj_por_indicador:item.ptj_por_indicador,
        puntaje:0,
        criterio: item.id_criterio
    });
    console.log('probando', cantidades.value);
}


const calcularTotal = (indi) => {
    indi.puntaje = parseFloat(indi.cantidad)* parseFloat(indi.ptj_por_indicador);
}

const calcularTotalIndicador = (indi) => {
    return parseFloat(indi.cantidad)*parseFloat(indi.ptj_por_indicador);
}

const calcularTotalCriterio = computed( () => {
    return (cri) => {
        const criterioCantidades = cantidades.value.filter( (item) => item.indicador === cri.id);
        const totalCriterio = criterioCantidades.reduce((puntaje,item) => {
            return puntaje + parseFloat(item.puntaje || 0)
        }, 0);
        console.log('puntaje total del criterio', cri);
        console.log('puntaje total',  totalCriterio)
        return totalCriterio;
    }
    // return function(obj){    
    //     let resulCriterio = 0;
    //     resulCriterio =  obj.cantidades.reduce((puntaje, indi)=>{
    //      return indi;
    //  }, 0);     
    //     console.log('llegando', resulCriterio)
    //     return resulCriterio;
    // }
});
// const calcularTotalCriterio = (cri) => {
//     const criterio = props.criterios[cri];
//     return criterio.value.reduce((puntaje, indi)=>{
//         return puntaje + (parseFloat(indi.puntaje) || 0);
//     }, 0);        
// }
//  watch(cantidades, () => {
//     calcularTotalCriterio();
//  },{deep: true});

//console.log('criterio', calcularTotalCriterio())
// const addItem = (item) => {
//     if(cantidades.value.length > 0){
    
//         cantidades.value.forEach(element => {
//             let data = cantidades.value.find(ele => ele.id === item.id);
//             if(!data)
//             {
//                 cantidades.value.push(item)
//             }
//         })
//         console.log('cantidadesdd', cantidades.value);
//     } else {
//         cantidades.value.push(item);
//         console.log('probando', item);
//         console.log('cantidades', cantidades.value);
//     }
    
// }

// const puntajeIndicador = () => {
//     const resultado = parseFloat(newItem.value)* parseFloat(form.ptj_por_indicador);
//     console.log('resultado', resultado);
    
// }



// const resulado = puntajeIndicador(newItem);
// console.log('suma', resulado);

</script>
