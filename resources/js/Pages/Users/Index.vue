<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            Usuarios
        </template>

        <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
            <div class="flex w-12 items-center justify-center bg-blue-500">
                <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>
    
            <div class="-mx-3 px-4 py-2">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Info</span>
                    <p class="text-sm text-gray-600">Sample table page</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-6">
            <PrimaryButton @click="openModal(1)" class="">
                <i class="fa-solid fa-plus-circle"></i>
                Agregar Usuario
            </PrimaryButton>
        </div>
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                            Name
                        </th>
                        <th class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id" class="text-gray-700">
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ user.name }}</p>
                        </td>
                        <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ user.email }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between">
                <pagination :links="users.links" />
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{ title }}</h2>
            <TextInput
                type="hidden"
                name="id_grupo"
                v-model="form.id_grupo"
            ></TextInput>
            <!-- <div v-if="integrante_existente" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ integrante_existente }}
            </div> -->
            <div  class="p-6 border-b border-gray-200" style="background-color: #1027d4; text-align: center;">
                    <label class="" style="color: #fff; font-weight: bold;">Digite DNI primero, para rellenar automaticamente los campos si el integrante ya se encuentra registrado en la base de datos</label>
                </div>
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div class="p-3">
                    <InputLabel for="condition" value="Coordinadores: " />
                    <select
                        name="condition"
                        id="condition"
                        class="mt-1 block w-full"
                        v-model="form.condition"
                    >
                        <option
                            v-for="(integrante, value) in integrantes"
                            :key="value"
                            :value="value"
                        >
                            {{ integrante.persona.name }}
                        </option>
                    </select>
                </div>                
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div class="p-3">
                    <InputLabel for="dni" value="Dni:"></InputLabel>
                    <TextInput
                        id="dni"
                        ref="nameImput"
                        v-model="form.dni"
                        @input="searchIntegranteVue"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Dni"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="name" value="Nombres:"></InputLabel>
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Nombre"
                        ref="nameImput"
                    ></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel
                        for="first_name"
                        value="Apellido Paterno:"
                    ></InputLabel>
                    <TextInput
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Apellido Paterno"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel
                        for="last_name"
                        value="Apellido Materno:"
                    ></InputLabel>
                    <TextInput
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Apellido Materno"
                    ></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="phone" value="Telefono:"></InputLabel>
                    <TextInput
                        id="phone"
                        v-model="form.phone"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Telefono"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="email" value="Email:"></InputLabel>
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Correo Electrónico"
                    >
                    </TextInput>
                </div>
            </div>            
            <div class="flex justify-center">
                <div class="p-3 mt-6">
                    <PrimaryButton :disabled="form.processing" @click="submit">
                        <i class="fa-solid fa save"></i>Guardar
                    </PrimaryButton>
                </div>
                <div class="p-3 mt-6">
                    <SecondaryButton
                        class="ml-3"
                        :disabled="form.processing"
                        @click="closeModal"
                    >
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import LinkPrimaryButton from '@/Components/LinkPrimaryButton.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import LinkWarningButton from "@/Components/LinkWarningButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from '@/Components/Pagination.vue'

import Modal from "@/Components/Modal.vue";
import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref } from "vue";
import axios from "axios";
import { onMounted } from "vue";
import { Head, useForm } from '@inertiajs/vue3';
//uso del Toast
import { Toast } from "@/Composables/Toast.js";
const toast = Toast();

const nameInput = ref(null);
const modal = ref(false);
const title = ref("");
const operation = ref(1);
const id = ref("");


const props = defineProps({
    users: Object,
    integrantes:Object
})

const form = useForm({
    dni: "",
    name: "",
    first_name: "",
    last_name: "",
    phone: "",
    email: "",
    id_tipo: 4,
    condition: "inv. Titular",
    orcid: "",
    cti_vitae: "",
    google_scholar: "",
    id_grupo: "",
    id_persona: "",
});
const openModal = (
    op,
    dni,
    name,
    first_name,
    last_name,
    phone,
    email,
    condition,
    orcid,
    cti_vitae,
    google_scholar,
    id_grupo,
    id_persona,
    integran
) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = integran;
    if (op == 1) {
        title.value = "Agregar Usuarios";
    } else {
        title.value = "Editar Usuarios";
        form.dni = dni;
        form.name = name;
        form.first_name = first_name;
        form.last_name = last_name;
        form.id_tipo = 4;
        form.phone = phone;
        form.email = email;
        form.condition = condition;
        form.orcid = orcid;
        form.cti_vitae = cti_vitae;
        form.google_scholar = google_scholar;
        form.id_grupo = id_grupo;
        form.id_persona = id_persona;
    }
};
const searchIntegranteVue = () => {
    axios
        .get(`/search-integrante/${form.dni}`)
        .then((response) => {
            const persona = response.data;
            if (persona) {
                form.name = persona.name;
                form.first_name = persona.first_name;
                form.last_name = persona.last_name;
                form.phone = persona.phone;
                form.email = persona.email;
            } else {
                form.name = "";
                form.first_name = "";
                form.last_name = "";
                form.phone = "";
                form.email = "";
            }
        })
        .catch((error) => {
            console.error(error);
        });
};
const closeModal = () => {
    modal.value = false;
    form.reset();
};

const submit = () => {
    if (operation.value === 1) {
        // Para una solicitud POST
        axios
            .post(route("grupo.registrar.integrante"), form)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data);
                // Puedes acceder a los datos de la respuesta
                intePerson.value = res.data.data;
                gruposIntegra.value = res.data.data;
                form.reset();
                closeModal();
                //ok("Registro Creado Correctamente");
                toast.toast('Exito', 'Registrado Correctamente','success');
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
                if (error.response && error.response.status == 422) {
                    //alert("El usuario ya esta registrado en otro grupo");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El Integrante ha alcanzado el numero máximo de grupos permitidos',
                    })
                }
            });
    } else {
        // Para una solicitud PUT
    //     form.put(route("grupo.actualizar.integrante", id.value), {
    //     onSuccess: () => {
    //         ok("Registro Actualizado Correctamente");
    //     },
    // });
    axios
        .put(route("grupo.actualizar.integrante", id.value), form)
        .then((updateRes) => {
            // Manejar la respuesta exitosa aquí
            console.log(updateRes.data);
            // Puedes acceder a los datos de la respuesta
            intePerson.value = updateRes.data.data;
            form.reset();
            closeModal();
            ok("Registro Actualizado Correctamente");
        })
        .catch((error) => {
            // Manejar el error aquí
            console.error(error);
        });
    }
};
const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: "success" });
};

</script>
