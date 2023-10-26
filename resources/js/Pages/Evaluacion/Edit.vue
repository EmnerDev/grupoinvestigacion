<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
           Editar Evaluacion
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-700">
                <div class="p-5 mb-5 border-b-2 border-gray-200 bg-teal-500 px-5 py-3 text-left text-xl font-semibold uppercase tracking-wider text-white" style="text-align: center;align-items: center;">
                    <h1>FICHA DE EVALUACION</h1>
                </div>
                <div>
                    <div>
                     <InputLabel>Integrante: </InputLabel>
                     <span>{{ integrantes.persona.name }} {{ integrantes.persona.first_name }} {{ integrantes.persona.last_name }}</span>
                    </div>
                    <div>
                     <InputLabel>Condicion: </InputLabel>
                     <span>{{ integrantes.condition }}</span>
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
                                        <template v-for="cri,j in criterios" :key="cri.id">
                                            <tr v-for="indi,i in cri.indicador" :key="indi.id">
                                            <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm" v-if="i===0" :rowspan="cri.indicador.length" >{{ j+1 }}</td>
                                            <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm" v-if="i===0" :rowspan="cri.indicador.length">
                                                {{ cri.name }}
                                            </td>
                                            <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm" v-if="evaluacionExists(cri, indi)">
                                                {{ indi.name }}
                                            </td>
                                            <template v-for="evaluacion in integrantes.evaluacion" :key="evaluacion.id">
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm" v-if="evaluacion.id_criterio === cri.id && evaluacion.id_indicador === indi.id">
                                                <TextInput v-model="evaluacion.cantidad" @input="calcularTotal(evaluacion,indi,j,i)"></TextInput>
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm" v-if="evaluacion.id_criterio === cri.id && evaluacion.id_indicador === indi.id">
                                                <InputLabel v-model="evaluacion.puntaje">{{ calcularTotalIndicador(evaluacion,indi) }}</InputLabel>
                                                </td>
                                            </template>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                    v-if="i===0" :rowspan="cri.indicador.length"
                                                        >
                                                        <InputLabel v-model="cri.puntaje">{{ calularTotalPorCriterio(cri) }}</InputLabel>
                                                </td>
                                            </tr>
                                        </template>


                                        <!-- <template v-for="cri,j  in criterios" :key="cri.id">

                                            <tr  v-for=" indi, i in cri.criterio.indicador" :key="indi.id">

                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.criterio.indicador.length">
                                                    {{ j+1 }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.criterio.indicador.length">
                                                    {{ cri.criterio.name }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    {{ indi.name }}
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <TextInput v-model="cri.cantidad"  id="cantidad" v-if="cri" @input="calcularTotal(cri,indi, j)" ></TextInput>
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                >
                                                    <InputLabel v-model="cri.puntaje" id="puntaje" >{{ calcularTotalIndicador(cri,indi) }}</InputLabel>
                                                </td>
                                                <td class="border-solid border-2 border-gray-700 bg-white px-5 py-5 text-sm"
                                                v-if="i===0" :rowspan="cri.criterio.indicador.length"
                                                    >
                                                    <InputLabel v-model="cri.puntaje">{{ calcularTotalCriterio(j) }}</InputLabel>
                                                </td>
                                            </tr>
                                        </template> -->
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
    evaluaciones: Object,
    criterios: Object,
    indicadores: Object,
    integrantes:Object,
    grupos: {
        type: Object,
        default: () => ({}),
    },
});




// console.log('criterios', props.criterios);
// console.log('indicadores', props.indicadores);
const cantidades = ref([]);
//const criterios = ref([]);
const puntajeCriterio = ref([]);
const totalGeneral = ref(0);
const intePerson = ref([]);
const gruposIntegra = ref([]);
const evaluaPuntaje = ref(props.evaluaciones);
const id_grupo = ref([]);

const form = useForm({
    cantidad:'',
    puntaje:'',
    id_criterio:'',
    id_indicador:'',
    id_integrante:'',
    id_grupo: '',
    ptj_por_indicador:''
})
//console.log('evaluacionesaaa', evaluaPuntaje.value[1].cantidad);
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

// const filtrarDuplicados = () =>{
//     const uniqueEvaluacion = [];
//     const seen = {};

//     for (const criterio of criterios.value ) {
//         const key = `${criterio.criterio.id}_${criterio.criterio.indicador.id}`;
//         if(!seen[key]){
//             uniqueEvaluacion.push(criterio)
//             seen[key] = true;
//         }
//     }
//     console.log('filtrar', uniqueEvaluacion);
//     criterios.value = uniqueEvaluacion;

// };

// const encontrarcantidadPorIndicador = (indicadorId) => {
//     //console.log('indicadorId',indicadorId)
//     const evaluacion = criterios.value.find((criterio) => criterio.criterio.indicador.some((indi)=> indi.id_criterio ===indicadorId));
//     console.log('evaluacion', evaluacion);
//    if(evaluacion){
//     return evaluacion.cantidad;
//    }else{
//     return 0;
//    }
// };

const evaluacionExists = (integrante, cri, indi) => {
    //console.log('integramte', cri);
    return computed(()=>{
        return props.integrantes.evaluacion.some(eva => eva.id_criterio === cri.id && eva.id_indicador === indi.id);
    });
};

const calcularTotal = (evaluacion,indi, j,i) => {
    //console.log('criterio', cri);
   // console.log('indicador', evaluacion);
    //return;
    const cantidad = parseFloat(evaluacion.cantidad);
    const ptjinidcador = parseFloat(indi.ptj_por_indicador);
    if(!isNaN(cantidad) && !isNaN(ptjinidcador)){
        evaluacion.puntaje = cantidad * ptjinidcador;
        //indi.puntaje = parseFloat(indi.cantidad)* parseFloat(indi.ptj_por_indicador);
        // const criterio = criterios.value[j];
        // criterio.puntaje = calcularTotalCriterio(j);
        // calcularTotalGeneral();
    }else{
        evaluacion.puntaje = 0;

        }
        const criterio = props.criterios[j];
        evaluacion.puntaje = calcularTotalCriterio(j);

        calcularTotalGeneral();
};

const calcularTotalIndicador = (evaluacion,indi) => {
    //console.log('indicador', evaluacion)

    let ptj = parseFloat(evaluacion.cantidad)*parseFloat(indi.ptj_por_indicador);
    const maxIndicador = parseFloat(indi.ptj_max_indicador);

    if(ptj > maxIndicador){
       ptj = maxIndicador;
    }
    evaluacion.puntaje = ptj;
    return ptj;
};


const calcularTotalCriterio = (j) => {
    //console.log('llegando', j);
    const criterio = props.criterios[j];
    //console.log('prueba', criterio);
    //return;
    let total = 0;
    const maximo = parseFloat(criterio.ptj_max_criterio);
    for(const indi of criterio.indicador){
        //console.log('datos indi', indi);
        total += calcularTotalIndicador(criterio,indi);
        if(total > maximo){
            total = maximo;
            break;
        }
        //console.log('suma', total)
    }
    //console.log('suma fuera del for', total)
    return total;
};

const calularTotalPorCriterio = (cri) => {
    //console.log('viendo', cri);
    const maximoPunto = parseFloat(cri.ptj_max_criterio);
    const evaluacionPorcriterio = props.integrantes.evaluacion.filter(eva=>eva.id_criterio === cri.id);
    let totalPuntaje = evaluacionPorcriterio.reduce((total,eva)=> {
        total += eva.puntaje
        if (total > maximoPunto) {
            total = maximoPunto;
        }
        return total;
    }, 0);
    return totalPuntaje;
};

const calcularTotalGeneral = () => {
    let total = 0
    for(const criterio of props.integrantes.evaluacion){
        total +=  parseFloat(criterio.puntaje);
    }
    //puntajeCriterio.value.totalGeneralEvaluado = total;
    console.log('total',total);
    return totalGeneral.value = total;

};

onMounted(async() =>{
    calcularTotalGeneral();
    intePerson.value = props.integrantes;
   // console.log('aquiiii', intePerson.value);

    puntajeCriterio.value = props.criterios;
    //criterios.value = props.integrantes;
    //console.log('aquiiii', criterios.value);
    gruposIntegra.value = props.grupos;
    evaluaPuntaje.value = props.evaluaciones;
    id_grupo.value = props.grupos.id
   // filtrarDuplicados();
});

console.log('grupos', props.integrantes.evaluacion.id_grupo);

const submit = () => {
        // Para una solicitud POST
        const datosEnviar = {
            evaluaciones: puntajeCriterio.value,
            totalGeneral: totalGeneral.value,
            integrante: props.integrantes
        }
        axios
            .put(route("actualizar.evaluacion",{ grupo_id: props.grupos[0].id }), datosEnviar)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data);
                if(res.data.code == 200){
                    form.reset();
                    ok(res.data);
                }
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
            });
};
const ok = (obj) => {
    form.reset();
    //Swal.fire({ title: msj, icon: "success" });
    Swal.fire({
            title: obj.msj,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='/grupos/evaluar/'+obj.id
            }
            })
};
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
