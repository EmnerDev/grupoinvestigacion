<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Grupo de Investigación - <span v-for="g in grupos" :key="g.id" :value="g.id">{{ g.name }}</span>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div v-for="g in grupos" :key="g.id" :value="g.id">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Nombre del Grupo" />
                            <span>{{ g.name }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Facultad" />
                            <span>{{ g.facultad.name }}</span>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Escuela" />
                            <span>{{ g.escuela.name }}</span>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Area de Investigación"
                            />
                            <span>{{ g.area_investigacion.name }}</span>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Linea" />
                            <span>{{ g.linea.name }}</span>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Sublinea" />
                            <span>{{ g.sublinea.name }}</span>
                        </div>
                    </div>
                    <form>
                        <div class="overflow-x-auto rounded-lg shadow mt-6">
                            <div class="mb-4">
                                <InputLabel for="name" value="Integrantes" />
                                <div class="flex justify-center">
                                    <PrimaryButton class="">
                                        Agregar Integrantes
                                    </PrimaryButton>
                                </div>
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
                                                Nombres
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Apellidos
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                condicion
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Orcid
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                Cti Vitae
                                            </th>
                                            <th
                                                class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                            >
                                                google Scholar
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
                                            v-for="(inte, i) in integrantes"
                                            :key="inte.id"
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
                                                    {{ inte.persona.name }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ inte.persona.first_name }} {{ inte.persona.last_name }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ inte.condition }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ inte.orcid }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ inte.cti_vitae }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                            >
                                                <p
                                                    class="text-gray-900 whitespace-no-wrap"
                                                >
                                                    {{ inte.google_escholar }}
                                                </p>
                                            </td>
                                            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
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
                    <div class="grid gap-6 mb-6 mt-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Espacio de Investigación"
                            />
                            <span>{{ g.space_inves }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Presentacion del grupo"
                            />
                            <span>{{ g.pre_group_inv }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="objetivos" />
                            <span>{{ g.objective }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Objetivo desarrollo sostenible"
                            />
                            <span>{{ g.obj_desa_soste_l_i }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Servicios" />
                            <span>{{ g.services }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Laboratorio" />
                            <span>{{ g.laboratory }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Equipamiento de  laboratorio"
                            />
                            <span>{{ g.labora_equip }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Pagina Web" />
                            <span>{{ g.pagina }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Oficina" />
                            <span>{{ g.office }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Telefono" />
                            <span>{{ g.phone }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="anexo" />
                            <span>{{ g.annexed }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                </div>
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
