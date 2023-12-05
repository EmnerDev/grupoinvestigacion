<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header> Dashboard </template>
        <div class="relative bg-emerald-600 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    <!-- Card stats -->
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                            <card-stats
                                statSubtitle="Docentes Nombrados"
                                :statTitle="totalDocenNombrado"
                                statArrow="up"
                                :statPercent="porcentajeMensual"
                                statPercentColor="text-emerald-500"
                                statDescripiron="Desde el mes pasado"
                                statIconName="far fa-chart-bar"
                                statIconColor="bg-red-500"
                            />
                        </div>
                        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                            <card-stats
                                statSubtitle="Docentes Contratados"
                                :statTitle="totalContratados"
                                statArrow="down"
                                statPercent="3.48"
                                statPercentColor="text-red-500"
                                statDescripiron="Since last week"
                                statIconName="fas fa-chart-pie"
                                statIconColor="bg-orange-500"
                            />
                        </div>
                        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                            <card-stats
                                statSubtitle="Total de Grupos"
                                :statTitle="totalGrupo"
                                statArrow="down"
                                statPercent="1.10"
                                statPercentColor="text-orange-500"
                                statDescripiron="Since yesterday"
                                statIconName="fas fa-users"
                                statIconColor="bg-pink-500"
                            />
                        </div>
                        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                            <card-stats
                                statSubtitle="PERFORMANCE"
                                statTitle="49,65%"
                                statArrow="up"
                                statPercent="12"
                                statPercentColor="text-emerald-500"
                                statDescripiron="Since last month"
                                statIconName="fas fa-percent"
                                statIconColor="bg-emerald-500"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div>
                    <div class="flex flex-wrap">
                        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                            <CardLineChart />
                        </div>
                        <div class="w-full xl:w-4/12 px-4">
                            <CardBarChart />
                        </div>
                    </div>
                    <!-- <div class="flex flex-wrap mt-4">
                        <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                            <CardPageVisits />
                        </div>
                        <div class="w-full xl:w-4/12 px-4">
                            <CardSocialTraffic />
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import CardLineChart from "@/Components/Cards/CardLineChart.vue";
import CardBarChart from "@/Components/Cards/CardBarChart.vue";
import CardPageVisits from "@/Components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/Components/Cards/CardSocialTraffic.vue";
import CardStats from "@/Components/Cards/CardStats.vue";
import { ref,onMounted } from "vue";

const porcentajeMensual = ref(0);

const props = defineProps({
  totalDocentesNombrados: Object,
  totalDocentesAnterior:Object,
  totalDocentesContratados:Object,
  totalGrupos:Object
});

const totalDocenNombrado = ref(props.totalDocentesNombrados);
const totalAnterior = ref(props.totalDocentesAnterior);

const totalContratados = ref(props.totalDocentesContratados);
const totalGrupo = ref(props.totalGrupos);

console.log('asdads', totalDocenNombrado);

const calcularPorcentajeMensual = () => {
    if(totalAnterior > 0){
        const cambioPorcentual = (totalDocenNombrado- totalAnterior)/totalAnterior*100;
        porcentajeMensual.value = cambioPorcentual.toFixed(2);
    }else{
        porcentajeMensual = 0;
    }
} 

onMounted(() =>{

});

// export default {
//   components: {
//     CardLineChart,
// CardBarChart,
// CardPageVisits,
// CardSocialTraffic,
// HeaderStats,
//   },
// };
</script>
