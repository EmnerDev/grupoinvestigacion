<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
           Lista de  Grupos de Investigación Registrados 
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form>
                        <div class="overflow-x-auto rounded-lg shadow mt-6">
                            <div class="mb-4">                              
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                N°
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Area de Investigacion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Linea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Sublinea
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Nombre del grupo
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Integrantes
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Condicion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(gru, i) in grupos"
                                            :key="gru.id"
                                            
                                        >
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ i + 1 }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.area_investigacion.name }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.linea.name }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.sublinea.name }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.name }}
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.integrante.id }}
                                                </p>
                                            </td>
                                            <td 
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ gru.integrante.condition }}
                                                </p>
                                            </td>
                                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                                <LinkButton class="mr-1" :href="route('ver.grupo',gru.id)"><i class="fa-solid fa-eye"></i></LinkButton>
                                                <WarningButton  class="mr-1">
                                                    <i class="fa-solid fa-edit"></i>
                                                </WarningButton>
                                                <DangerButton><i class="fa-solid fa-trash"></i></DangerButton>
                                            </td>
                                        </tr>
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
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

const props = defineProps({
    grupos: {
        type: Object,
    },
    integrantes: {
        type: Object,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route("registrar.grupo"), {
        onSuccess: () => {
            ok("Registro creado Correctamente");
        },
    });
};
const ok = (msj) => {
    form.reset();
    Swal.fire({ title: msj, icon: "success" });
};

</script>
