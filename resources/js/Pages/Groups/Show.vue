<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Grupo de Investigación - <span>{{ grupos.name }}</span>
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Nombre del Grupo" />
                            <span>{{ grupos.name }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Facultad" />
                            <span>{{ grupos.facultad.name }}</span>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Escuela" />
                            <span>{{ grupos.escuela.name }}</span>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Area de Investigación"
                            />
                            <span>{{ grupos.area_investigacion.name }}</span>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Linea" />
                            <span>{{ grupos.linea.name }}</span>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Sublinea" />
                            <span>{{ grupos.sublinea.name }}</span>
                        </div>
                    </div>
                    <form>
                        <div class="overflow-x-auto rounded-lg shadow mt-6">
                            <div class="mb-4">
                                <InputLabel for="name" value="Integrantes" />
                                <div class="flex justify-center mb-6">
                                    <PrimaryButton @click="openModal(1)" class="">
                                        <i class="fa-solid fa-plus-circle"></i>
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
                                                <WarningButton  class="mr-1" @click="openModal(2,inte.dni, inte.name, inte.first_name, inte.last_name, inte.phone, inte.email, inte.condition, inte.orcid, inte.cti_vitae, inte.google_scholar,inte.id_grupo, inte.id_persona, inte.id)">
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
                            <span>{{ grupos.space_inves }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Presentacion del grupo"
                            />
                            <span>{{ grupos.pre_group_inv }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="objetivos" />
                            <span>{{ grupos.objective }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Objetivo desarrollo sostenible"
                            />
                            <span>{{ grupos.obj_desa_soste_l_i }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Servicios" />
                            <span>{{ grupos.services }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Laboratorio" />
                            <span>{{ grupos.laboratory }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Equipamiento de  laboratorio"
                            />
                            <span>{{ grupos.labora_equip }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Pagina Web" />
                            <span>{{ grupos.pagina }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Oficina" />
                            <span>{{ grupos.office }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Telefono" />
                            <span>{{ grupos.phone }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="anexo" />
                            <span>{{ grupos.annexed }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
 <h2>{{ title }}</h2>
 <InputLabel>dsfds</InputLabel>
        </Modal>
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

const nameInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');

const props = defineProps({
    grupos: {
        type: Object,
    },
    integrantes: {
        type: Object,
    },
});

const form = useForm({
    dni:'',
    name:'',
    first_name:'',
    last_name:'',
    phone:'',
    email:'',
    condition:'',
    orcid:'',
    cti_vitae:'',
    google_scholar:'',
    id_grupo:'',
    id_persona:'',
});

const openModal = (op,dni, name, first_name, last_name, phone, email, condition, orcid, cti_vitae, google_scholar,id_grupo, id_persona, persona) => {
    modal.value = true;
    nextTick( () => nameInput.value.focus());
    operation.value = op;
    id.value = persona;
    if (op == 1){
        title.value = 'Agregar Integrantes';
    } else {
        title.value = 'Editar Integrantes';
        form.dni =dni;
        form.name=name;
        form.first_name=first_name;
        form.last_name=last_name;
        form.id_tipo=tipo;
        form.phone=phone;
        form.email = email;
        form.condition = condition;
        form.orcid = orcid;
        form.cti_vitae = cti_vitae;
        form.google_scholar = google_scholar;
        form.id_grupo = id_grupo;
        form.id_persona = id_persona;
    }
}

const submit = () => {
    if(operation.value = 1){
        form.post(route("grupo.registrar.integrante"), {
        onSuccess: () => {
            ok("Registro creado Correctamente");
        },
    });
    } else{
        form.put(route("grupo.registrar.integrante"), {
        onSuccess: () => {
            ok("Registro Actualizado Correctamente");
        },
    });
    }
    
};
const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: "success" });
};
</script>
